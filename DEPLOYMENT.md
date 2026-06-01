# Production Deployment Checklist

## Sebelum Deploy ke Hosting

### 1. Environment Configuration ✓
- [x] `.env` sudah dikonfigurasi untuk production
  - `APP_DEBUG=false`
  - `APP_ENV=production`
  - `LOG_LEVEL=error`
  - Update `APP_URL` sesuai domain Anda

- [ ] Database configuration
  - Update `DB_CONNECTION` sesuai database host
  - Pastikan credentials aman

### 2. Assets & Build ✓
- [x] CSS dan JS sudah di-setup dengan Vite
- [ ] Jalankan `npm run build` sebelum deploy
  - Generated files akan berada di `/public/build`
  
### 3. File Structure ✓
- [x] Blade templates sudah refactored menggunakan base layout
- [x] Kode sudah clean dan tidak ada debug statements

### 4. Security Checklist
- [x] `.env` tidak ter-track di git (.gitignore sudah benar)
- [x] Debug mode OFF untuk production
- [x] Log level set ke ERROR
- [ ] Pastikan key generation: `php artisan key:generate`
- [ ] Set proper file permissions:
  ```
  chmod -R 775 storage/
  chmod -R 775 bootstrap/cache/
  ```

### 5. Database
- [ ] Jalankan migrations: `php artisan migrate --force`
- [ ] Seed data jika diperlukan: `php artisan db:seed`

### 6. Caching (Optional tapi Recommended)
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### 7. Testing
- [ ] Test semua routes
  - `/` - welcome page
  - `/profil` - profile
  - `/kontak` - contact form
  - `/bantuan` - help page
  - `/katalog` - catalog

### 8. Final Checks
- [ ] No errors in Laravel logs
- [ ] All images loaded correctly
- [ ] Responsive design works on mobile
- [ ] External links working

## Deployment Steps (Simplified)

```bash
# 1. Clone or pull latest code
git pull origin main

# 2. Install dependencies
composer install --no-dev
npm install

# 3. Setup environment
cp .env.example .env
php artisan key:generate

# 4. Build assets
npm run build

# 5. Run migrations
php artisan migrate --force

# 6. Set permissions
chmod -R 775 storage bootstrap/cache

# 7. Optimize cache
php artisan config:cache
php artisan route:cache
```

## Hosting Requirements

- PHP 8.3 atau lebih tinggi
- Laravel 13+
- Node.js untuk build assets
- Composer untuk dependency management
- Database server (MySQL/PostgreSQL/SQLite)

## Support

Jika ada masalah, check:
- `/storage/logs/laravel.log` untuk error details
- Pastikan directory permissions correct
- Verify database connection settings
