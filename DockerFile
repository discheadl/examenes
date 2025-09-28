# Imagen base con PHP + Apache
FROM php:8.2-apache

# Instala extensiones necesarias para CakePHP
RUN apt-get update && apt-get install -y \
    libicu-dev libzip-dev unzip git \
    && docker-php-ext-install intl pdo pdo_mysql \
    && a2enmod rewrite \
    && rm -rf /var/lib/apt/lists/*

# Configura el DocumentRoot a webroot/
ENV APACHE_DOCUMENT_ROOT=/var/www/html/webroot
RUN sed -ri 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/000-default.conf /etc/apache2/apache2.conf
RUN sed -ri 's/AllowOverride None/AllowOverride All/i' /etc/apache2/apache2.conf

# Copia el código
WORKDIR /var/www/html
COPY . /var/www/html

# Instala dependencias de Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader --ignore-platform-req=ext-intl

# Permisos para tmp y logs
RUN chown -R www-data:www-data /var/www/html/tmp /var/www/html/logs

EXPOSE 80
CMD ["apache2-foreground"]
