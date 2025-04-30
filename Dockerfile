# Usa la imagen oficial de PHP con Apache
FROM php:8.2-apache

# Actualiza el sistema y habilita las dependencias necesarias
RUN apt-get update && apt-get install -y \
    libssl-dev \
    && apt-get clean \
    && docker-php-ext-install openssl \
    && rm -rf /var/lib/apt/lists/*

# Establece el directorio de trabajo
WORKDIR /var/www/html

# Copia los archivos del proyecto al contenedor
COPY . .

# Instala las dependencias de Laravel
RUN composer install --no-dev --optimize-autoloader

# Genera la clave de la app (solo si no la inyectas manualmente)
RUN php artisan key:generate

# Da permisos a la carpeta de almacenamiento
RUN chown -R www-data:www-data storage bootstrap/cache

# Expone el puerto 80
EXPOSE 80

# Apunta a public/ como la raíz del servidor
RUN sed -i 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf

# Habilita módulos de Apache si se desea
RUN a2enmod rewrite

# Inicia Apache al arrancar el contenedor
CMD ["apache2-foreground"]
