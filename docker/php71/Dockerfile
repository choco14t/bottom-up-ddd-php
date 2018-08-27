FROM php:7.1-fpm

RUN docker-php-ext-install pdo_mysql

#composer
RUN curl -sS https://getcomposer.org/installer | php && \
    mv composer.phar /usr/local/bin/composer && \
    chmod 777 /usr/local/bin/composer

WORKDIR /var/www/html
