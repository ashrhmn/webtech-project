FROM php:8.0-apache
# COPY docker-php-entrypoint /usr/local/bin/docker-php-entrypoint

# COPY users.txt /usr/data/fs/users.txt
# COPY session.txt /usr/data/fs/session.txt

#RUN mkdir -p /usr/data/fs
#RUN mkdir -p /usr/data/fs/upload
#RUN touch /usr/data/fs/users.txt
#RUN touch /usr/data/fs/session.txt
#RUN touch /usr/data/fs/equipments.txt
#RUN touch /usr/data/fs/availableDoctors.txt
#RUN chmod -R 777 /usr/data/fs/

#COPY index.php /var/www/html
RUN mkdir -p /var/www/html/app
RUN touch /var/www/html/index.php
RUN echo "<?php header('location: app/views');" > /var/www/html/index.php
#RUN mkdir -p /var/ww/html/assets
RUN mkdir -p /var/www/html/assets/user
COPY default.png /var/www/html/assets/
RUN chmod -R 777 /var/www/html/assets
RUN echo "export DOCKER_ENV=true" >> /etc/apache2/envvars
RUN docker-php-ext-install mysqli
