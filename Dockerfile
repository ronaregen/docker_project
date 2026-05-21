# PONDASI: Mengambil OS minimal + runtime PHP
FROM php:8.4-fpm-alpine

# EKSEKUSI: Install driver Postgres di dalam OS
RUN apk add --no-cache libpq-dev && docker-php-ext-install pdo_pgsql

# LOKASI: Pindah ke folder kerja utama di dalam container
WORKDIR /var/www

# SALIN: Ambil file project dari laptop, masukkan ke /var/www
COPY ./myApp .

COPY --from=composer /usr/bin/composer /usr/bin/composer

RUN composer install


# RUNTIME: Perintah utama yang jalan saat container dinyalakan

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=80"]