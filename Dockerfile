FROM composer:latest as composer_stage

FROM php:8.3-cli

WORKDIR /var/www/html

COPY --from=composer_stage /usr/bin/composer /usr/bin/composer

COPY . .

RUN apt-get update && apt-get install -y \
    libpq-dev \
    && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install pdo pdo_pgsql

RUN composer install --no-dev --optimize-autoloader

RUN chmod +x /var/www/html/artisan

EXPOSE 8000

CMD ["php", "artisan", "serve", "--host", "0.0.0.0", "--port", "8000"]
