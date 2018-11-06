FROM php:7.2-fpm

RUN apt-get update \
    && apt-get install -y libpq-dev libzip-dev --no-install-recommends zip unzip git\
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-configure bcmath \
    && docker-php-ext-install pdo pdo_mysql pgsql bcmath mbstring
RUN apt-get update && apt-get install -y libmemcached-dev \
    && pecl install memcached \
    && docker-php-ext-enable memcached
RUN apt-get update && apt-get install -y

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php --filename=composer --install-dir=/usr/local/bin
RUN php -r "unlink('composer-setup.php');"

WORKDIR /var/www/PrimePass-API

EXPOSE 9000

CMD ["php-fpm" "-F"]
