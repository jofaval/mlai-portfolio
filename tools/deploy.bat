REM Move to the correct scope
call scope.bat

REM Execute the production deployment script
REM python production/upload.py
php cli deploy

REM pause