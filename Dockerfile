FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip unzip \
    && docker-php-ext-install pdo pdo_mysql

WORKDIR /var/www/html

COPY . .


RUN chown -R www-data:www-data /var/www/html