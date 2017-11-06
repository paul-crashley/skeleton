FROM khanhicetea/php7-fpm-docker

RUN apt-get update
RUN apt-get -y install vim
RUN pecl install xdebug
RUN apt-get -y install php-xdebug

COPY . /var/www

RUN apt-get install -y --no-install-recommends git zip
RUN curl --silent --show-error https://getcomposer.org/installer | php

RUN composer self-update && \
    composer global require "hirak/prestissimo:^0.3" --no-interaction --no-ansi --quiet --no-progress --prefer-dist

RUN cd /var/www && \
    composer install --working-dir=/var/www --no-autoloader --no-scripts --no-interaction --no-progress && \
    composer dump-autoload

RUN chown -R www-data:www-data /var/www

WORKDIR /var/www
