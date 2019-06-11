FROM php:7.2-apache

RUN apt-get update && apt-get install -y git zip unzip \
    && php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && rm composer-setup.php \
    && a2enmod rewrite headers \
    && docker-php-ext-install mysqli pdo_mysql bcmath exif

RUN apt-get install -y libpng-dev libjpeg-dev \
    && docker-php-ext-configure gd --with-png-dir=/usr --with-jpeg-dir=/usr \
    && docker-php-ext-install gd
