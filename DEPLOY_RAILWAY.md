# 🚀 Deploy ke Railway (RECOMMENDED)

Railway adalah pilihan terbaik untuk project Laravel ini. Berikut panduan lengkapnya.

## 📋 Kenapa Railway?

✅ **Terbaik untuk Laravel**
- Native PHP support
- PostgreSQL included  
- Auto-scaling
- $5/month (all-in)

✅ **Mudah Setup**
- One-click GitHub connection
- Auto-detect Laravel
- Auto-migrations
- Zero config

✅ **Production Ready**
- 99.9% uptime SLA
- Global CDN
- Automatic backups
- SSL/HTTPS

---

## 🎯 Step-by-Step Deployment

### Step 1: Prepare GitHub Repository

```bash
# 1. Initialize git (if not already)
git init

# 2. Add remote
git remote add origin https://github.com/YOUR-USERNAME/personal-portfolio.git

# 3. Create .gitignore entries (if not exists)
echo "node_modules" >> .gitignore
echo ".env" >> .gitignore
echo "vendor" >> .gitignore

# 4. Commit semua file
git add .
git commit -m "Initial commit - production ready"

# 5. Push ke GitHub
git branch -M main
git push -u origin main
```

### Step 2: Setup Railway Account

1. Buka https://railway.app
2. Click "Start a New Project"
3. Choose "Deploy from GitHub"
4. Authorize Railway dengan GitHub account Anda
5. Select repository `personal-portfolio`

### Step 3: Configure Railway

Setelah connected:

1. Railway automatically detects Laravel ✅
2. Click "Create Service"
3. Choose "Database"
4. Select "PostgreSQL"

### Step 4: Set Environment Variables

Di Railway dashboard, add variables:

```env
APP_NAME=PersonalPortfolio
APP_ENV=production
APP_DEBUG=false
APP_KEY=base64:mQcW1SEbjiJTip/KClb2N7V4SVC8q6tZhAfJSErtEpA=
APP_URL=https://your-app.railway.app
LOG_LEVEL=error
LOG_CHANNEL=stack

DB_CONNECTION=postgresql
DB_HOST=${{Postgres.PGHOST}}
DB_PORT=5432
DB_DATABASE=${{Postgres.PGDATABASE}}
DB_USERNAME=${{Postgres.PGUSER}}
DB_PASSWORD=${{Postgres.PGPASSWORD}}
```

### Step 5: Deploy

```bash
# Push changes to trigger deployment
git add .
git commit -m "Deploy to Railway"
git push origin main
```

Railway akan automatically:
- ✅ Install composer packages
- ✅ Run npm build
- ✅ Run migrations
- ✅ Start server
- ✅ Setup SSL

---

## ✅ Post-Deployment Verification

### 1. Check Deployment Status
- Go to Railway dashboard
- Look for green checkmark ✅

### 2. Check Logs
```
Railroad > Service > Logs > Check for errors
```

### 3. Test Routes
```
https://your-app.railway.app/
https://your-app.railway.app/profil
https://your-app.railway.app/kontak
https://your-app.railway.app/bantuan
https://your-app.railway.app/katalog
```

### 4. Monitor
```
Railroad > Monitoring tab
- Check CPU, Memory
- Check error rates
```

---

## 🎁 Custom Domain Setup

### 1. Buy Domain
- Namecheap, GoDaddy, Vercel Domains, dll

### 2. Add Domain in Railway
```
Service > Settings > Domains > Add Domain
```

### 3. Update DNS Records
```
Type: CNAME
Name: @
Value: cname.railway.app
TTL: 3600
```

### 4. Wait for SSL
- Railway auto-generates SSL certificate
- Wait 5-10 minutes
- Your domain ready! ✅

---

## 🔧 Database Migration (SQLite → PostgreSQL)

Railway automatically provides PostgreSQL. Jangan khawatir tentang migration - data Anda akan otomatis dimigrasi.

Tapi jika ada data existing:

```bash
# Locally, export SQLite data
php artisan tinker
```

---

## 📊 Monitoring & Maintenance

### View Logs
```
Railway Dashboard > Service > Logs
```

### Scale Resources
```
Railway Dashboard > Service > Settings > Resources
- Default: $5/month
- Scalable if needed
```

### Update Code
```bash
# Make changes locally
git add .
git commit -m "Update feature"
git push origin main

# Railway automatically redeploys ✅
```

---

## 💰 Pricing

| Item | Cost |
|------|------|
| Web Service | Included |
| PostgreSQL (free tier) | $5/month |
| Storage (5GB) | Included |
| Network | Included |
| SSL/HTTPS | Free |
| **Total** | **$5/month** |

---

## 🆘 Troubleshooting

### Deployment Failed

**Check logs:**
```
Railway > Service > Logs > Find error
```

**Common issues:**
- Missing PHP version: Add `runtime: php-8.3` in railway.toml
- Build failed: Check npm/composer
- Database connection: Verify env vars

### Site shows error

```bash
# SSH into Railway environment
railway run bash

# Check logs
tail -f storage/logs/laravel.log

# Run migrations manually
php artisan migrate --force
```

### Slow loading

```bash
# Check performance
railroad > Monitoring

# Optimize
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

---

## 📱 GitHub Auto-Deploy

Railway automatically deploys ketika Anda:

1. Push to main branch
2. Create pull request
3. Merge PR

Jadi workflow jadi:

```bash
# Local development
git add .
git commit -m "feature"
git push origin feature-branch

# Create PR di GitHub
# Review
# Merge ke main

# Railway automatically deploys! ✅
```

---

## 🎯 Next Steps

1. ✅ Push code to GitHub
2. ✅ Create Railway account  
3. ✅ Connect GitHub repository
4. ✅ Set environment variables
5. ✅ Deploy
6. ✅ Verify all routes working
7. ✅ Add custom domain
8. ✅ Done! 🎉

---

## 📞 Support

**Railway Support:** https://railway.app/support

**Laravel Issues:** https://laravel.com/docs

**This Project Issues:** Check `storage/logs/laravel.log`

---

**Estimated Setup Time: 15 minutes** ⏱️

**Cost: $5/month** 💚

**Uptime: 99.9%** 📈

Good luck deploying! 🚀
