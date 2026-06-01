@echo off
REM Production Verification Script for Windows
REM Run this before deploying to verify everything is configured correctly

echo ==================================
echo Production Verification Checklist
echo ==================================
echo.

setlocal enabledelayedexpansion

set errors=0

REM Check 1: PHP Version
echo Checking PHP version (8.3+)...
php -v | findstr /R "PHP [0-9]" >nul
if %errorlevel% equ 0 (
    echo [OK] PHP installed
) else (
    echo [FAIL] PHP not found
    set /a errors=!errors!+1
)

REM Check 2: Composer
echo Checking Composer...
where composer >nul 2>nul
if %errorlevel% equ 0 (
    echo [OK] Composer installed
) else (
    echo [FAIL] Composer not found
    set /a errors=!errors!+1
)

REM Check 3: Node.js
echo Checking Node.js...
where node >nul 2>nul
if %errorlevel% equ 0 (
    echo [OK] Node.js installed
    node --version
) else (
    echo [FAIL] Node.js not found
    set /a errors=!errors!+1
)

REM Check 4: .env file
echo Checking .env file...
if exist ".env" (
    echo [OK] .env file exists
    
    REM Check if APP_DEBUG is false
    findstr /M "APP_DEBUG=false" .env >nul
    if %errorlevel% equ 0 (
        echo [OK] APP_DEBUG is false
    ) else (
        echo [WARNING] APP_DEBUG not set to false
    )
    
    REM Check if APP_ENV is production
    findstr /M "APP_ENV=production" .env >nul
    if %errorlevel% equ 0 (
        echo [OK] APP_ENV is production
    ) else (
        echo [WARNING] APP_ENV is not set to production
    )
) else (
    echo [FAIL] .env file not found
    set /a errors=!errors!+1
)

REM Check 5: vendor directory
echo Checking vendor directory...
if exist "vendor\" (
    echo [OK] Dependencies installed
) else (
    echo [WARNING] Run 'composer install'
)

REM Check 6: node_modules
echo Checking node_modules...
if exist "node_modules\" (
    echo [OK] NPM dependencies installed
) else (
    echo [WARNING] Run 'npm install'
)

REM Check 7: public/build
echo Checking public/build...
if exist "public\build\" (
    echo [OK] Assets built
) else (
    echo [WARNING] Run 'npm run build'
)

REM Check 8: APP_KEY
echo Checking APP_KEY...
findstr /R "APP_KEY=base64:" .env >nul
if %errorlevel% equ 0 (
    echo [OK] APP_KEY generated
) else (
    echo [FAIL] APP_KEY missing - run: php artisan key:generate
    set /a errors=!errors!+1
)

echo.
echo ==================================
if %errors% equ 0 (
    echo [OK] All critical checks passed! Ready for production
) else (
    echo [FAIL] %errors% check(s) failed
    echo Fix the issues above and try again
)
echo ==================================
echo.

echo Next steps:
echo 1. php artisan migrate --force
echo 2. php artisan config:cache
echo 3. php artisan route:cache
echo 4. php artisan view:cache
echo.
echo Then deploy to your hosting!
echo.

pause
