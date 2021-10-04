ARG PHP_VERSION=""
FROM php:${PHP_VERSION:+${PHP_VERSION}-}fpm-alpine

RUN apk update  
RUN apk upgrade  
#RUN apk add libfreetype6-dev libjpeg62-turbo-dev libpng-dev

RUN docker-php-ext-install mysqli 
RUN docker-php-ext-install pdo_mysql 

RUN docker-php-ext-enable pdo_mysql

COPY php.ini /usr/local/etc/php/conf.d/php.ini

