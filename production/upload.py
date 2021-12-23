import os, paramiko, zipfile, glob
from typing import Callable, List
from posixpath import dirname

from paramiko.sftp_client import SFTPClient
from paramiko.transport import Transport
from config import host, port, username, password
import time, datetime

baselocaldir = os.getcwd()
targetlocaldir = os.path.join(baselocaldir, 'build')

# TODO: implement include/exclude?
ignorepath = os.path.join(dirname(__file__), '.ignore')
ignore = []

def isignorelinevalid(line: str) -> str:
    """
    Is the line valid

    line : str
        The line to evaluate

    returns bool
    """
    if line[0] in [ '#', '/', ' ' ]: return False

    return True

def parseignoreline(line: str) -> str:
    """
    Prepares the line

    line : str
        The line to evaluate

    returns str
    """
    line = line.strip()

    return line

# Appends the ignore content
with open(ignorepath, 'r+') as lines:
    ignore += [ parseignoreline(line) for line in lines if isignorelinevalid(line) ]

ignoredirs = [ dir.replace(baselocaldir, '').replace('/*', '') for dir in ignore if dir.endswith('/*') ]
ignorefiles = [ file for file in ignore if not file.endswith('/*') ]

# Number of threads, deprecated
WORKERS = 10
# Debugging state
DEBUG = False

# deploypaths
baseremotedir = '/mlai.jofaval.com'
releasefilename = 'release.zip'
releasepath = os.path.join('production', 'deployments', releasefilename)
absolutereleasepath = os.path.realpath(releasepath)
releaseremotedir = baseremotedir + '/' + releasefilename

def writezipfile(ziph: zipfile.ZipFile, parse: Callable[[str,], str], file: str) -> None: 
    """
    Writes a file in a zip

    ziph : Connector
        The zip file handler
    parse : lambda
        The pre-processing function
    file : str
        The file to wite

    returns None
    """
    if DEBUG: print(f'Zipping file {file}')

    targetfile = parse(file)
    ziph.write(file, targetfile)

def zipfiles(root: str, files: List[str], filename: str) -> None:
    """
    Zips files for the upload

    root : str
        Root folder
    files : str[]
        All the files to zip
    filename : str
        Target filename of the .zip

    returns None
    """
    start = time.time()

    with zipfile.ZipFile(filename, 'w', zipfile.ZIP_DEFLATED, compresslevel=1) as ziph:
        parse = lambda f: f.replace(root, '').replace('\\', '/')[1:]
        [ writezipfile(ziph, parse, file) for file in files ]

    end = time.time()
    progress = datetime.timedelta(seconds=(end - start))
    print('Time for .zip compression:', progress)

def connect(callback) -> None:
    """
    Connects to a host

    callback : callable
        The callback function with the actions

    returns None
    """
    with paramiko.Transport((host, port)) as transport:
        connection = transport.connect(username = username, password = password)
        connection
        
        with paramiko.SFTPClient.from_transport(transport) as sftp:
            callback(sftp, transport)

def upload(sftp: SFTPClient, transport: Transport) -> None:
    """
    Uploads the deployment .zip

    sftp : sftp
        The SFTP connector
    transport : transport
        The SSH transport

    returns None
    """
    start = time.time()

    sftp.put(absolutereleasepath, releaseremotedir)

    end = time.time()
    progress = datetime.timedelta(seconds=(end - start))
    print('Total time for SFTP upload:', progress)

def isdirnamevalid(file: str) -> bool:
    """
    Is a diretory allowed (not ignored)

    file : str
        The file to evaluate

    returns bool
    """
    dirname = os.path.dirname(file)
    dirname = dirname.replace(baselocaldir, '')
    dirname = dirname.replace('\\', '/')
    dirname = dirname[1:]

    similardirs = [ dir for dir in ignoredirs if dirname.startswith(dir) ]

    return not bool(similardirs)

def isfilenamevalid(file: str) -> bool:
    """
    Is a filename allowed (not ignored)

    file : str
        The file to evaluate

    returns bool
    """
    filename = os.path.basename(file)

    return not filename in ignorefiles

def isfileallowed(file: str) -> bool:
    """
    Is a file allowed (not ignored)

    file : str
        The file to evaluate

    returns bool
    """
    # checks wether the path is one to ignore
    if not isdirnamevalid(file): return False

    # checks wether the filename is one to ignore
    if not isfilenamevalid(file): return False

    if not os.path.isfile(file): return False

    return True

def parsefile(file: str) -> str:
    # file = file.replace(f'{targetlocaldir}\\', '')

    return file

def getfiles() -> List[str]:
    """
    Returns all the files to compile

    returns List[str]
    """
    absolutepath = os.path.join(targetlocaldir, '**/**')

    files = [ parsefile(file) for file in glob.iglob(absolutepath, recursive=True) if isfileallowed(file) ]
    # files.append(os.path.join(baselocaldir, '.htaccess'))

    return files

def preparezip() -> None:
    """
    Prepares the .zip file

    returns None
    """
    localfiles = getfiles()

    targetpath = os.path.join(baselocaldir, 'production', 'deployments')
    if not os.path.exists(targetpath): os.mkdir(targetpath)

    # The previously deployed file
    if os.path.exists(absolutereleasepath): os.remove(absolutereleasepath)
    # The deployment .zip gets generated
    zipfiles(targetlocaldir, localfiles, absolutereleasepath)

def deploy() -> None:
    """
    Deploys the .zip in the server

    returns None
    """
    if DEBUG: print('Deploy starts')
    
    start = time.time()

    sshclient = paramiko.SSHClient()
    sshclient.set_missing_host_key_policy(paramiko.AutoAddPolicy())
    sshclient.connect(hostname=host, username=username, password=password)

    if DEBUG: print('Connected successfully')

    # deploypath = baseremotedir[1:] + '/' + 'prueba'
    deploypath = baseremotedir[1:] + '/'
    deployfile = deploypath + '/' + releasefilename
    unzipcommand = f'unzip -o {deployfile} -d {deploypath}'

    if DEBUG: print('Arguments are prepared')

    # stdin, stdout, stderr = sshclient.exec_command('unzip ' + baseremotedir + '/' + releasefilename)
    # stdin, stdout, stderr = sshclient.exec_command('unzip ' + '/existencias.jofaval.com/prueba/release.zip')
    # este funciona
    # stdin, stdout, stderr = sshclient.exec_command('unzip existencias.jofaval.com/prueba/release.zip')
    stdin, stdout, stderr = sshclient.exec_command(unzipcommand)

    if DEBUG: print('Command was executed')

    # The .zip deployed is removed
    command = f'rm "{deployfile}"'
    stdin, stdout, stderr = sshclient.exec_command(command)
    
    if DEBUG: print('The .zip to avoid possible bugs')

    # stdin, stdout, stderr = sshclient.exec_command('ls ' + deploypath)

    clean = lambda s: s.read().decode()
    if DEBUG: print(clean(stdout), clean(stderr))

    end = time.time()
    progress = datetime.timedelta(seconds=(end - start))
    print('Time for deployment:', progress)

def build() -> None:
    """
    Makes the build, of everything

    returns None
    """
    start = time.time()

    response = os.system('php cli build')

    print(response)

    end = time.time()
    progress = datetime.timedelta(seconds=(end - start))
    print('Total build time:', progress)

def main() -> None:
    start = time.time()

    # build()
    preparezip()
    connect(upload)
    deploy()

    end = time.time()
    progress = datetime.timedelta(seconds=(end - start))
    print('Total execution time:', progress)

DEBUG = False
if __name__ == '__main__':
    main()