FROM php:8.0-apache

RUN mkdir -p /var/www/html/app
RUN touch /var/www/html/index.php
RUN echo "<?php header('location: app/views');" > /var/www/html/index.php
RUN mkdir -p /var/www/html/assets/user
COPY default.png /var/www/html/assets/

RUN chmod -R 777 /var/www/html/assets

RUN echo "export DOCKER_ENV=true" >> /etc/apache2/envvars

ARG DB_HOST
ARG DB_PORT
ARG DB_NAME
ARG DB_USER
ARG DB_PASSWORD

RUN echo "export DB_HOST=${DB_HOST}" >> /etc/apache2/envvars
RUN echo "export DB_PORT=${DB_PORT}" >> /etc/apache2/envvars
RUN echo "export DB_NAME=${DB_NAME}" >> /etc/apache2/envvars
RUN echo "export DB_USER=${DB_USER}" >> /etc/apache2/envvars
RUN echo "export DB_PASSWORD=${DB_PASSWORD}" >> /etc/apache2/envvars

RUN docker-php-ext-install mysqli
