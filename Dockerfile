FROM php:7.4-apache

RUN a2enmod rewrite

RUN apt-get update && apt-get install -y \
        zlib1g-dev \
        libicu-dev \
        libxml2-dev \
        libpq-dev \
        libzip-dev \
        && docker-php-ext-install pdo pdo_mysql zip intl xmlrpc soap opcache \
        && docker-php-ext-configure pdo_mysql --with-pdo-mysql=mysqlnd


RUN apt-get update -y 

# Node 14
RUN curl -sL https://deb.nodesource.com/setup_14.x | bash -- \
	&& apt-get install -y nodejs \
	&& apt-get autoremove -y

# Composer
COPY --from=composer /usr/bin/composer /usr/bin/composer

# PHP Apache
COPY  docker/000-default.conf /etc/apache2/sites-available/000-default.conf


ENV COMPOSER_ALLOW_SUPERUSER 1
