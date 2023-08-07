FROM php:8.2-fpm-alpine

RUN apk update && apk add \
    curl \
    libpng-dev \
    libxml2-dev \
    zip \
    unzip

RUN docker-php-ext-install pdo pdo_mysql

WORKDIR /var/www/app
COPY . .

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
RUN composer install

USER root
RUN chmod 777 -R storage/
