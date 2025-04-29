# Usa PHP 8.2 con Apache preinstalado
FROM php:8.2-apache

# Habilita mod_rewrite (necesario para Laravel)
RUN a2enmod rewrite

# Instala dependencias necesarias
RUN apt-get update && apt-get install -y \
    git unzip curl libonig-dev libzip-dev zip \
    && docker-php-ext-install pdo pdo_mysql mbstring zip

# Copia Composer desde su imagen oficial
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copia el código fuente de tu proyecto Laravel
COPY . /var/www/html

# Copia tu configuración personalizada de Apache
COPY ./docker/apache/000-default.conf /etc/apache2/sites-available/000-default.conf

# Establece el directorio de trabajo
WORKDIR /var/www/html

# Da permisos a Laravel para que pueda escribir en storage y cache
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage \
    && chmod -R 755 /var/www/html/bootstrap/cache

# Instala dependencias PHP de Laravel
RUN composer install --no-dev --optimize-autoloader

# Expone el puerto que usará Apache
EXPOSE 80

# Comando que mantiene Apache en ejecución
CMD ["apache2-foreground"]
