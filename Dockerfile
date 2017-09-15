FROM khanhicetea/php7-fpm-docker

RUN apt-get update
RUN pecl install xdebug
RUN apt-get install php-xdebug

COPY . /var/www

RUN chown -R www-data:www-data /var/www

WORKDIR /var/www