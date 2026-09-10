# Usar una imagen base de PHP
FROM php:8.1-apache

# Instalar extensiones necesarias
RUN docker-php-ext-install pdo_mysql

# Copiar los archivos del proyecto al contenedor
COPY . /var/www/html

# Configurar permisos
RUN chown -R www-data:www-data /var/www/html

# Exponer el puerto 80
EXPOSE 80

# Iniciar Apache
CMD ["apache2-foreground"]
