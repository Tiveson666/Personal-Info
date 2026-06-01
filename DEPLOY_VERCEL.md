# 🚀 Deploy ke Vercel (Not Recommended but Possible)

> ⚠️ **Catatan**: Vercel lebih cocok untuk frontend. Laravel di Vercel = serverless functions (slow, expensive). **Railway lebih recommended** - tapi guide ini disediakan untuk referensi.

---

## ⚠️ Vercel untuk Laravel

### Pros ✅
- Very fast CDN
- Easy deployment
- Great for static content
- Preview deployments

### Cons ❌
- Serverless functions (10s limit)
- SQLite tidak support
- High cost ($20+/month)
- Slow cold start
- Not ideal for traditional apps

---

## 🔄 Setup Vercel + Laravel

### Step 1: Persiapan

```bash
# Install Vercel CLI
npm install -g vercel

# Login
vercel login
```

### Step 2: Database Setup

Laravel di Vercel memerlukan managed database (SQLite tidak work):

**Pilihan:**

#### A. Supabase (PostgreSQL)
1. Buka https://supabase.com
2. Create new project
3. Copy connection string
4. Update .env

#### B. PlanetScale (MySQL)  
1. Buka https://planetscale.com
2. Create new database
3. Copy connection string
4. Update .env

#### C. AWS RDS
1. Create RDS instance
2. Setup security groups
3. Copy connection details

### Step 3: Update .env.example

```env
APP_NAME=Portfolio
APP_ENV=production
APP_DEBUG=false
APP_KEY=base64:xxxxx
APP_URL=https://your-app.vercel.app

# Database (example: Supabase PostgreSQL)
DB_CONNECTION=pgsql
DB_HOST=db.xxxxx.supabase.co
DB_PORT=5432
DB_DATABASE=postgres
DB_USERNAME=postgres
DB_PASSWORD=your_password_here

LOG_LEVEL=error
CACHE_DRIVER=array
SESSION_DRIVER=file
QUEUE_CONNECTION=sync
```

### Step 4: Update vercel.json

```json
{
  "buildCommand": "npm install && composer install && npm run build",
  "outputDirectory": "public",
  "functions": {
    "api/index.php": {
      "runtime": "php-8.3"
    }
  },
  "routes": [
    {
      "src": "/(.*)",
      "dest": "/api/index.php"
    }
  ],
  "env": {
    "APP_ENV": "production",
    "LOG_CHANNEL": "stack"
  }
}
```

### Step 5: Create api/index.php

```bash
mkdir -p api
```

File: `api/index.php`
```php
<?php

// Vercel serverless function entry point
require __DIR__ . '/../public/index.php';
```

### Step 6: Deploy

```bash
# Push to GitHub
git add .
git commit -m "Deploy to Vercel"
git push origin main

# Or use Vercel CLI
vercel
```

---

## 🔧 Configuration untuk Vercel

### Environment Variables

Di Vercel Dashboard:

```
Settings > Environment Variables > Add
```

Add:
- APP_NAME=Portfolio
- APP_ENV=production
- APP_DEBUG=false
- APP_KEY=base64:xxxxx
- APP_URL=yourdomain.com
- DB_CONNECTION=pgsql
- DB_HOST=your_db_host
- DB_PORT=5432
- DB_DATABASE=your_db
- DB_USERNAME=your_user
- DB_PASSWORD=your_password
- LOG_LEVEL=error
```

---

## ⚡ Performance Optimization

Vercel serverless butuh optimization:

```bash
# 1. Remove dev dependencies
composer install --no-dev --prefer-dist --optimize-autoloader

# 2. Cache everything
php artisan config:cache
php artisan route:cache
php artisan view:cache

# 3. Minify assets
npm run build
```

### Update composer.json

```json
{
  "scripts": {
    "post-install-cmd": [
      "php artisan package:discover --ansi"
    ],
    "post-update-cmd": [
      "php artisan package:discover --ansi"
    ]
  }
}
```

---

## 💰 Cost Estimate

| Service | Cost | Notes |
|---------|------|-------|
| Vercel Compute | $20/month | Function invocations |
| Vercel Storage | $0 | First 1GB free |
| Database (Supabase) | $25/month | Starter plan |
| Domain | $12/year | Average |
| **Total** | **$45+/month** | Expensive! |

---

## 📊 Vercel vs Railway vs Render

| Faktor | Vercel | Railway ⭐ | Render |
|--------|--------|-----------|--------|
| Cost | $45+ | $5 | $12 |
| Setup Time | 30 min | 10 min | 20 min |
| Performance | Good | Great | Good |
| Laravel Support | Limited | Excellent | Good |
| Best for | Frontend | Backend/Laravel | Hybrid |

---

## 🆘 Troubleshooting Vercel

### Deployment Failed
```
Check Vercel logs:
Dashboard > Function > Logs
```

### 504 Gateway Timeout
- Vercel function limit: 10 seconds
- This project might exceed limit
- Solution: Use Railway instead

### Database Connection Error
```
1. Verify DB credentials in env
2. Check IP whitelist
3. Test locally first
```

### Cold Start Slow
- Normal untuk serverless
- First request: 5-10 seconds
- Subsequent: 100ms

---

## ✅ Testing Before Deploy

```bash
# Test locally
php artisan serve

# Test all routes
curl http://localhost:8000/
curl http://localhost:8000/profil
curl http://localhost:8000/kontak
```

---

## 🎯 Recommendation

**Gunakan Railway, bukan Vercel untuk project ini karena:**

1. ✅ 9x lebih murah ($5 vs $45)
2. ✅ Lebih cepat (no serverless cold start)
3. ✅ Laravel native support
4. ✅ Simpler setup
5. ✅ Better for production

**Vercel baik untuk:**
- Frontend only (Next.js, React, Vue)
- Bukan traditional server apps

---

## 📞 Resources

- Vercel Docs: https://vercel.com/docs
- Laravel + Vercel: Community support only
- Railway (Recommended): https://railway.app

---

**Recommendation: Deploy ke Railway instead** 🚀
