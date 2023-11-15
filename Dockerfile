FROM php:8-apache

RUN apt-get update && apt-get install -y libpq-dev && apt-get install -y libxml2-dev

RUN docker-php-ext-install pdo pdo_pgsql soap

RUN a2enmod rewrite

COPY . /var/www/html