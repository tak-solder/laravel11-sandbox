FROM php:8.3-apache

RUN apt-get update \
  && apt-get install -y git unzip \
  && a2enmod rewrite speling \
  && docker-php-ext-install pdo_mysql \
  && pecl install xdebug \
  && docker-php-ext-enable xdebug

COPY --from=composer /usr/bin/composer /usr/bin/composer
ENV COMPOSER_ALLOW_SUPERUSER=1

WORKDIR /var/www/

EXPOSE 80
ENV TZ Asia/Tokyo

COPY ./.docker/develop/000-default.conf /etc/apache2/sites-available/000-default.conf
COPY ./.docker/develop/php.ini /usr/local/etc/php/php.ini
