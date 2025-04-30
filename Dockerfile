FROM php:8.2-apache
 
 # Establece el directorio de trabajo
 WORKDIR /var/www/html
 
 # Instala dependencias necesarias
 RUN apt-get update && apt-get install -y \
     git \
     curl \
     zip \
     unzip \
     libzip-dev \
     && docker-php-ext-install zip pdo
 
 # Instala Composer
 COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
 
 # Copia los archivos del proyecto al contenedor
 COPY . .
 
 # Instala las dependencias de Laravel
 RUN composer install --no-dev --optimize-autoloader
 
 
 
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