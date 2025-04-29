FROM php:8.2-fpm

# Instala extensiones necesarias
RUN apt-get update && apt-get install -y \
    libpng-dev libjpeg-dev libonig-dev libxml2-dev zip unzip curl git \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Instala Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Copia el código
COPY . .

# Instala dependencias
RUN composer install --optimize-autoloader --no-dev

# Permisos
RUN chown -R www-data:www-data /var/www

# Expone el puerto
EXPOSE 8000

CMD php artisan serve --host=0.0.0.0 --port=8000
