FROM php:7.4-apache

RUN apt-get update && apt-get upgrade -y && apt-get install -y git zip unzip \
    && php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && rm composer-setup.php \
    && a2enmod rewrite headers \
    && docker-php-ext-install mysqli pdo_mysql bcmath exif

RUN apt-get install -y libpng-dev libjpeg-dev \
    && docker-php-ext-configure gd --with-jpeg \
    && docker-php-ext-install gd

RUN openssl req -x509 -nodes -days 365 -newkey rsa:2048 \
    -keyout /etc/ssl/private/apache-selfsigned.key \
    -out /etc/ssl/certs/apache-selfsigned.crt \
    -subj "/C=GB/ST=London/L=London/O=Global Security/OU=IT Department/CN=example.com" \
    && a2enmod ssl
