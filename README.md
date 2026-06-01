# Personal Portfolio Website

A modern portfolio website built with **Laravel 13** and **Tailwind CSS**, featuring a profile showcase, project catalog, and contact functionality.

## Features

- ✨ Modern, responsive design with Tailwind CSS
- 🎨 Dark mode compatible UI
- 📱 Mobile-first responsive layout
- ⚡ Optimized with Vite build system
- 🔧 Built with Laravel 13 framework
- 📧 Contact form with validation

## Tech Stack

- **Backend:** Laravel 13
- **Frontend:** Tailwind CSS 4, Vite
- **Database:** SQLite (default, can be configured)
- **CSS Framework:** Tailwind CSS

## Pages

- **Home** (`/`) - Welcome page
- **Profile** (`/profil`) - Developer profile
- **Contact** (`/kontak`) - Contact form
- **Help** (`/bantuan`) - Help center
- **Catalog** (`/katalog`) - Project showcase

## Quick Start (Development)

### Requirements
- PHP 8.3+
- Node.js 18+
- Composer
- npm/yarn

### Installation

```bash
# 1. Install PHP dependencies
composer install

# 2. Install Node dependencies
npm install

# 3. Copy environment file
cp .env.example .env

# 4. Generate app key
php artisan key:generate

# 5. Build frontend assets
npm run build

# 6. Start development server
php artisan serve
```

Visit `http://localhost:8000` in your browser.

## Development Commands

```bash
# Watch mode for development
npm run dev

# Build for production
npm run build

# Run tests
composer test

# Format code
php artisan pint
```

## Production Deployment

### Pre-Deployment Checklist

1. **Environment Setup**
   ```bash
   cp .env.example .env
   # Edit .env with production values
   php artisan key:generate
   ```

2. **Build Assets**
   ```bash
   npm run build
   ```

3. **Install Dependencies**
   ```bash
   composer install --no-dev
   npm install --production
   ```

4. **Database Setup**
   ```bash
   php artisan migrate --force
   ```

5. **Optimize for Production**
   ```bash
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```

6. **Set Permissions**
   ```bash
   chmod -R 775 storage bootstrap/cache
   ```

### Hosting Recommendations

- **Server Requirements:**
  - PHP 8.3 or higher
  - Modern web server (Apache/Nginx)
  - Database server (MySQL/PostgreSQL/SQLite)
  
- **Recommended Hosts:**
  - Heroku, Railway, Vercel
  - AWS, DigitalOcean, Linode
  - Traditional hosting with SSH access

### Environment Variables

Key variables to configure on production:

```
APP_ENV=production
APP_DEBUG=false
APP_URL=https://yourdomain.com
LOG_LEVEL=error
DB_CONNECTION=mysql
DB_HOST=your_host
DB_PORT=3306
DB_DATABASE=your_db
DB_USERNAME=your_user
DB_PASSWORD=your_password
```

See [DEPLOYMENT.md](DEPLOYMENT.md) for detailed deployment instructions.

## Project Structure

```
├── app/                    # Laravel application code
├── resources/
│   ├── css/               # Tailwind CSS
│   ├── js/                # JavaScript assets
│   └── views/             # Blade templates
├── routes/                # Web routes
├── config/                # Configuration files
├── public/                # Public assets
│   └── build/            # Compiled assets (generated)
└── storage/              # Storage and logs
```

## Configuration

### Database
The project uses SQLite by default. To switch databases:

1. Update `.env`:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=portfolio
DB_USERNAME=root
DB_PASSWORD=
```

2. Run migrations:
```bash
php artisan migrate
```

## File Structure

After deployment, ensure these permissions:
- `storage/` - writable (775)
- `bootstrap/cache/` - writable (775)
- `public/` - readable (755)

## Troubleshooting

**Assets not loading?**
- Run `npm run build`
- Check that `public/build` exists
- Verify `APP_URL` in `.env`

**Database errors?**
- Check database connection in `.env`
- Ensure database server is running
- Run migrations: `php artisan migrate`

**Permission denied?**
```bash
chmod -R 755 bootstrap
chmod -R 755 storage
```

## License

MIT License. See LICENSE file for details.

## Support & Contact

For support or inquiries, use the contact form at `/kontak`.

---

**Built with ❤️ using Laravel & Tailwind CSS**

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
