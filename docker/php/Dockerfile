FROM php:7.4-apache

RUN a2enmod rewrite \
    && apt-get update \
    && docker-php-ext-install mysqli pdo pdo_mysql

ENV PLATFORM="docker"
RUN export PLATFORM="docker"
