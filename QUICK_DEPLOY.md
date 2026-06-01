# 🚀 Quick Deploy Guide

Panduan cepat untuk deploy project ke hosting.

## Opsi 1: Hosting Tradisional (cPanel/Shared Hosting)

### Persiapan di Local

```bash
# 1. Build assets
npm install
npm run build

# 2. Clear development files
rm -rf node_modules/
php artisan cache:clear
php artisan config:clear
```

### Upload ke Server

1. Upload semua file (kecuali: `node_modules/`, `.env`, `.git`)
2. Edit `.env` file di server dengan credentials yang benar
3. Upload ke folder `public` saja untuk public access

### Di Server (SSH)

```bash
# 1. Navigate to project
cd ~/public_html/yourproject

# 2. Install dependencies
composer install --no-dev

# 3. Generate key (jika belum)
php artisan key:generate

# 4. Setup database
php artisan migrate --force

# 5. Optimize
php artisan config:cache
php artisan route:cache
php artisan view:cache

# 6. Set permissions
chmod -R 755 bootstrap storage public
chmod -R 644 bootstrap storage public/*.php
```

## Opsi 2: Platform as a Service (PaaS)

### Contoh: Railway atau Heroku

#### 1. Connect Repository
```bash
git push heroku main
# atau
git push railway main
```

#### 2. Set Environment Variables
```bash
heroku config:set APP_KEY=base64:YOUR_KEY
heroku config:set APP_ENV=production
heroku config:set APP_DEBUG=false
# dll...
```

#### 3. Run Migrations
```bash
heroku run php artisan migrate
# atau
railway run php artisan migrate
```

## Opsi 3: VPS (DigitalOcean, Linode, AWS)

### 1. Setup Server
```bash
# Update system
sudo apt update && apt upgrade -y

# Install dependencies
sudo apt install -y php8.3 php8.3-fpm php8.3-cli \
    composer nodejs npm mysql-server nginx

# Create app directory
sudo mkdir -p /var/www/myapp
cd /var/www/myapp
```

### 2. Clone dan Setup
```bash
# Clone project
git clone your-repo .

# Install dependencies
composer install --no-dev
npm ci

# Build assets
npm run build

# Setup environment
cp .env.example .env
php artisan key:generate

# Setup database
php artisan migrate --force

# Create cache
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### 3. Configure Nginx
```nginx
server {
    listen 80;
    server_name yourdomain.com www.yourdomain.com;

    root /var/www/myapp/public;
    index index.php;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        fastcgi_pass unix:/run/php/php8.3-fpm.sock;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.ht {
        deny all;
    }
}
```

### 4. SSL & Permissions
```bash
# Get free SSL (Let's Encrypt)
sudo apt install certbot python3-certbot-nginx
sudo certbot --nginx -d yourdomain.com

# Set permissions
sudo chown -R www-data:www-data /var/www/myapp
sudo chmod -R 755 /var/www/myapp
chmod -R 755 storage bootstrap
```

## Troubleshooting

### ❌ 500 Internal Server Error
**Check:**
```bash
# View logs
tail -f storage/logs/laravel.log

# Verify .env
cat .env | grep APP_

# Check permissions
ls -la storage/
ls -la bootstrap/cache
```

### ❌ Assets Not Loading
```bash
# Rebuild
npm run build

# Clear cache
php artisan config:cache
php artisan cache:clear
```

### ❌ Database Connection Error
```bash
# Verify .env
cat .env | grep DB_

# Test connection
php artisan db:show

# Run migrations
php artisan migrate --force
```

### ❌ Permission Denied
```bash
chmod -R 755 storage
chmod -R 755 bootstrap
chown -R www-data:www-data /path/to/app
```

## Environment Variables (Important!)

Create `.env` file on server with these values:

```env
APP_NAME=PersonalPortfolio
APP_ENV=production
APP_KEY=base64:xxxxx (generated via php artisan key:generate)
APP_DEBUG=false
APP_URL=https://yourdomain.com

DB_CONNECTION=mysql
DB_HOST=your_db_host
DB_PORT=3306
DB_DATABASE=your_db_name
DB_USERNAME=your_db_user
DB_PASSWORD=your_db_password

LOG_LEVEL=error
LOG_CHANNEL=stack
```

## Post-Deployment

After successful deployment:

```bash
# 1. Run migrations
php artisan migrate --force

# 2. Cache everything
php artisan config:cache
php artisan route:cache
php artisan view:cache

# 3. Monitor logs
tail -f storage/logs/laravel.log

# 4. Test all pages
curl https://yourdomain.com
curl https://yourdomain.com/profil
curl https://yourdomain.com/kontak
```

## Auto-Deployment (Optional)

### With GitHub Actions
Create `.github/workflows/deploy.yml`:

```yaml
name: Deploy
on:
  push:
    branches: [main]

jobs:
  deploy:
    runs-on: ubuntu-latest
    steps:
      - uses: actions/checkout@v2
      - name: Deploy
        uses: appleboy/ssh-action@master
        with:
          host: ${{ secrets.HOST }}
          username: ${{ secrets.USERNAME }}
          key: ${{ secrets.SSH_KEY }}
          script: |
            cd /var/www/myapp
            git pull
            composer install --no-dev
            npm ci && npm run build
            php artisan migrate --force
            php artisan config:cache
```

## Support

Dokumentasi lengkap: [DEPLOYMENT.md](DEPLOYMENT.md)  
Checklist verifikasi: [PRODUCTION_CHECKLIST.md](PRODUCTION_CHECKLIST.md)

**Butuh bantuan? Cek logs di `storage/logs/laravel.log`** 📋
