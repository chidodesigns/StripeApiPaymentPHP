FROM php:7.2-apache

LABEL maintainer="Chido Designs"

COPY .docker/php/php.ini /usr/local/etc/php/

COPY . /srv/app

COPY .docker/apache/vhost.conf /etc/apache2/sites-available/000-default.conf

RUN docker-php-ext-install pdo_mysql 

RUN a2enmod rewrite negotiation

RUN chown -R www-data:www-data /srv/app

# WORKDIR /srv/app
