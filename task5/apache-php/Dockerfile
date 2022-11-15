FROM php:8.1-apache
RUN docker-php-ext-install mysqli

RUN apt-get update \
 && apt-get install -y apache2-utils libaprutil1-dbd-mysql \
 && a2enmod authn_dbd

RUN pecl install redis
RUN docker-php-ext-enable redis