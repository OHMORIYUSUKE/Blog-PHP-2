FROM php:7.4-apache

COPY php.ini /usr/local/etc/php/

RUN apt-get update \
  && docker-php-ext-install pdo_mysql

RUN a2enmod rewrite \
  && service apache2 restart

# SQLを実行するディレクトリ
WORKDIR /user_sql/
