FROM php:8.0-apache
# COPY docker-php-entrypoint /usr/local/bin/docker-php-entrypoint

# COPY users.txt /usr/data/fs/users.txt
# COPY session.txt /usr/data/fs/session.txt

RUN mkdir -p /usr/data/fs
RUN touch /usr/data/fs/users.txt
RUN touch /usr/data/fs/session.txt
RUN chmod -R 777 /usr/data/fs/
RUN echo "export DOCKER_ENV=true" >> /etc/apache2/envvars
RUN docker-php-ext-install mysqli