# Imagen base oficial de PHP con Apache
FROM php:8.2-apache

# Instalar dependencias necesarias para Laravel
RUN apt-get update && apt-get install -y \
    zip unzip curl git libzip-dev \
    && docker-php-ext-install zip pdo pdo_mysql

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copiar el código de Laravel al contenedor
COPY . /var/www/html

# Establecer directorio de trabajo
WORKDIR /var/www/html

# Instalar dependencias PHP con Composer
RUN composer install --no-dev --optimize-autoloader

# Establecer permisos correctos
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Habilitar mod_rewrite en Apache
RUN a2enmod rewrite

# Configurar Apache
RUN echo '<Directory /var/www/html>\n\
    AllowOverride All\n\
</Directory>' >> /etc/apache2/apache2.conf

EXPOSE 80
