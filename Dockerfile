# Usa una imagen base de PHP con Apache (Laravel necesita ambos)
FROM php:8.2-apache

# Habilita mod_rewrite en Apache (es necesario para que Laravel maneje rutas correctamente)
RUN a2enmod rewrite

# Instala extensiones necesarias para que Laravel funcione
RUN apt-get update && apt-get install -y \
    git unzip curl libonig-dev libzip-dev zip \
    && docker-php-ext-install pdo pdo_mysql mbstring zip

# Copia Composer desde otra imagen oficial (esto lo instala)
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copia todos los archivos de tu proyecto al servidor
COPY . /var/www/html

# Establece la carpeta principal donde se ejecutará la aplicación
WORKDIR /var/www/html

# Cambia permisos para que Laravel pueda escribir archivos (logs, cachés, etc.)
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage


# Instala dependencias del proyecto Laravel (las del archivo composer.json)
RUN composer install --no-dev --optimize-autoloader

# Expone el puerto 80 (que Apache usará)
EXPOSE 80

# Comando para que Apache se quede corriendo
CMD ["apache2-foreground"]
