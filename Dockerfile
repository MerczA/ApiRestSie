# Usa una imagen base oficial de PHP con extensiones requeridas
FROM php:8.2-fpm

# Instala dependencias del sistema
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    curl \
    sqlite3 \
    libsqlite3-dev \
    git \
    && docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd

# Instala Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copia el código del proyecto
WORKDIR /var/www
COPY . .

# Instala dependencias del proyecto
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Da permisos
RUN chown -R www-data:www-data /var/www && chmod -R 755 /var/www/storage

# Expone el puerto
EXPOSE 8000

# Comando para correr Laravel con el servidor embebido
CMD php artisan serve --host=0.0.0.0 --port=8000