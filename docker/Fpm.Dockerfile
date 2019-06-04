FROM php:7.1-fpm

RUN apt-get update \
&& docker-php-ext-install pdo pdo_mysql

WORKDIR /var/www/laravel-docker

RUN php artisan storage:link 