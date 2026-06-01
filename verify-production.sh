#!/bin/bash

# Production Verification Script
# Run this before deploying to verify everything is configured correctly

echo "=================================="
echo "Production Verification Checklist"
echo "=================================="
echo ""

# Colors for output
GREEN='\033[0;32m'
RED='\033[0;31m'
YELLOW='\033[1;33m'
NC='\033[0m' # No Color

errors=0

# Check 1: PHP Version
echo -n "Checking PHP version (8.3+)... "
php_version=$(php -r 'echo PHP_VERSION;')
if [[ "$php_version" > "8.3" ]]; then
    echo -e "${GREEN}✓${NC} PHP $php_version"
else
    echo -e "${RED}✗${NC} PHP $php_version (Need 8.3+)"
    ((errors++))
fi

# Check 2: Composer
echo -n "Checking Composer... "
if command -v composer &> /dev/null; then
    echo -e "${GREEN}✓${NC} Installed"
else
    echo -e "${RED}✗${NC} Not installed"
    ((errors++))
fi

# Check 3: Node.js
echo -n "Checking Node.js... "
if command -v node &> /dev/null; then
    node_version=$(node -v)
    echo -e "${GREEN}✓${NC} $node_version"
else
    echo -e "${RED}✗${NC} Not installed"
    ((errors++))
fi

# Check 4: .env file
echo -n "Checking .env file... "
if [ -f .env ]; then
    echo -e "${GREEN}✓${NC} Exists"
    
    # Check .env values
    if grep -q "APP_DEBUG=false" .env; then
        echo -e "  ${GREEN}✓${NC} APP_DEBUG is false"
    else
        echo -e "  ${YELLOW}!${NC} APP_DEBUG not set to false"
    fi
    
    if grep -q "APP_ENV=production" .env; then
        echo -e "  ${GREEN}✓${NC} APP_ENV is production"
    else
        echo -e "  ${YELLOW}!${NC} APP_ENV is not production"
    fi
else
    echo -e "${RED}✗${NC} Missing"
    ((errors++))
fi

# Check 5: vendor directory
echo -n "Checking vendor directory... "
if [ -d vendor ]; then
    echo -e "${GREEN}✓${NC} Dependencies installed"
else
    echo -e "${YELLOW}!${NC} Run 'composer install'"
fi

# Check 6: node_modules
echo -n "Checking node_modules... "
if [ -d node_modules ]; then
    echo -e "${GREEN}✓${NC} NPM dependencies installed"
else
    echo -e "${YELLOW}!${NC} Run 'npm install'"
fi

# Check 7: public/build
echo -n "Checking public/build... "
if [ -d public/build ]; then
    echo -e "${GREEN}✓${NC} Assets built"
else
    echo -e "${YELLOW}!${NC} Run 'npm run build'"
fi

# Check 8: Storage permissions
echo -n "Checking storage permissions... "
if [ -w storage ]; then
    echo -e "${GREEN}✓${NC} storage is writable"
else
    echo -e "${YELLOW}!${NC} storage not writable - run: chmod -R 755 storage"
fi

# Check 9: Bootstrap cache permissions
echo -n "Checking bootstrap/cache permissions... "
if [ -w bootstrap/cache ]; then
    echo -e "${GREEN}✓${NC} bootstrap/cache is writable"
else
    echo -e "${YELLOW}!${NC} bootstrap/cache not writable - run: chmod -R 755 bootstrap"
fi

# Check 10: APP_KEY
echo -n "Checking APP_KEY... "
if grep -q "APP_KEY=base64:" .env && [ "$(grep 'APP_KEY=' .env | cut -d= -f2)" != "" ]; then
    echo -e "${GREEN}✓${NC} Generated"
else
    echo -e "${RED}✗${NC} Missing - run: php artisan key:generate"
    ((errors++))
fi

echo ""
echo "=================================="
if [ $errors -eq 0 ]; then
    echo -e "${GREEN}✓ All checks passed! Ready for production${NC}"
else
    echo -e "${RED}✗ $errors check(s) failed${NC}"
    echo "Fix the issues above and try again"
fi
echo "=================================="
echo ""

# Provide next steps
echo "Next steps:"
echo "1. php artisan migrate --force"
echo "2. php artisan config:cache"
echo "3. php artisan route:cache"
echo "4. php artisan view:cache"
echo ""
echo "Then deploy to your hosting!"
