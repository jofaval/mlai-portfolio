REM Boot Bob The Builder
start cmd /K observer.bat

REM Move to the correct scope
call scope.bat

REM Execute the local webserver at the production build dir
php -S localhost:42069 -t build/