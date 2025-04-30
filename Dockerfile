# Usa una imagen oficial de PHP con soporte para Laravel
FROM php:8.2-fpm

# Instala dependencias del sistema
RUN apt-get update && apt-get install -y \
    git curl zip unzip libpng-dev libonig-dev libxml2-dev libzip-dev \
    && docker-php-ext-install pdo pdo_mysql mbstring zip exif pcntl

# Instala Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Establece directorio de trabajo
WORKDIR /var/www

# Copia los archivos del proyecto
COPY . .

# Instala dependencias PHP
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Establece permisos adecuados
RUN chown -R www-data:www-data /var/www \
    && chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# Expone el puerto que usará Render (Render asigna automáticamente uno)
EXPOSE 8080

# Comando para ejecutar Laravel (usa el servidor embebido de Laravel)
CMD php artisan serve --host=0.0.0.0 --port=8080
