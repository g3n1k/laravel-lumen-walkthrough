FROM php:7.3-apache
MAINTAINER g3n1k

RUN apt-get update && apt-get install -y \
        unzip \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        libaio1 \
        libxml2-dev \
        libzip-dev \
    && docker-php-ext-install -j$(nproc) iconv gettext \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd pdo pdo_mysql mysqli zip xml xmlwriter

ADD ./inc/dev.conf /etc/apache2/conf-available/
ADD ./inc/dev.ini /usr/local/etc/php/conf.d/
RUN a2enconf dev
RUN a2enmod rewrite

# you can add more command here


RUN service apache2 restart
