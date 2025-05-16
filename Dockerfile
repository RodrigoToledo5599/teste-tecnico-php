FROM php:8.4-apache

RUN a2enmod rewrite

RUN apt-get update && apt-get install -y \
    libzip-dev unzip zip \
    libpng-dev libjpeg-dev libfreetype6-dev zlib1g-dev \
    libmariadb-dev libicu-dev

RUN docker-php-ext-install pdo_mysql zip

RUN echo "EnableSendfile Off" >> /etc/apache2/apache2.conf

COPY . /var/www/html

WORKDIR /var/www/html

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# RUN composer install

RUN chown -R www-data:www-data /var/www/html