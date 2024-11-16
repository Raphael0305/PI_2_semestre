FROM php:8.2.25-apache

RUN set -ex && \
    apt update && \
    apt install -y \
    default-mysql-client \
    libmariadb-dev

RUN docker-php-ext-install pdo_mysql mysqli