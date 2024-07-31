FROM php:7.4-apache

RUN docker-php-ext-install pdo pdo_mysql mysqli && \
    php -m | grep pdo && \
    php -m | grep mysqli

COPY src/ /var/www/html/
