# Imagen base oficial de PHP con Apache
FROM php:8.2-apache

# Variables de entorno básicas
ENV COMPOSER_ALLOW_SUPERUSER=1

# Instalación de extensiones necesarias
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    unzip \
    zip \
    curl \
    libssl-dev \
    && docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath zip openssl \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Habilita mod_rewrite para Laravel
RUN a2enmod rewrite

# Establece el directorio de trabajo
WORKDIR /var/www/html

# Copia todo el código de tu proyecto al contenedor
COPY . .

# Copia y configura Composer (si no usas una imagen base que ya lo trae)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Instala las dependencias de Laravel
RUN composer install --no-dev --optimize-autoloader

# Da permisos necesarios a Laravel
RUN chown -R www-data:www-data storage bootstrap/cache

# Apunta Apache al directorio public/
RUN sed -i 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf

# Expone el puerto 80
EXPOSE 80

# Comando de inicio
CMD ["apache2-foreground"]
