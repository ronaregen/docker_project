# PONDASI: Mengambil OS minimal + runtime PHP
FROM php:8.4-fpm-alpine

# EKSEKUSI: Install driver Postgres di dalam OS
RUN apk add --no-cache sqlite-dev && docker-php-ext-install pdo_sqlite

# LOKASI: Pindah ke folder kerja utama di dalam container
WORKDIR /var/www

# SALIN: Ambil file project dari laptop, masukkan ke /var/www
COPY ./myApp .

# RUNTIME: Perintah utama yang jalan saat container dinyalakan
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=80"]