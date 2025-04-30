# Usamos una imagen base oficial de PHP con Nginx
FROM php:8.1-fpm

# Instalamos las dependencias necesarias
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd \
    && docker-php-ext-install pdo pdo_mysql

# Instalamos Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copiamos el código de Laravel al contenedor
COPY . /var/www/html

# Establecemos el directorio de trabajo
WORKDIR /var/www/html

# Instalamos las dependencias de Composer
RUN composer install --no-dev --optimize-autoloader

# Exponemos el puerto 9000
EXPOSE 9000

# Comando para iniciar PHP-FPM
CMD ["php-fpm"]
