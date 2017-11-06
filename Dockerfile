FROM khanhicetea/php7-fpm-docker

RUN apt-get update
RUN apt-get -y install vim
RUN pecl install xdebug
RUN apt-get -y install php-xdebug

COPY . /var/www

RUN chown -R www-data:www-data /var/www

WORKDIR /var/www
