FROM mysql
# ADD init.sh /tmp/init.sh
# COPY dump.sql /tmp/dump.sql
# RUN chmod+x /tmp/init.sh
# RUN /tmp/init.sh

# RUN /etc/init.d/mysql start && /bin/bash -c "/usr/bin/mysqld_safe --skip-grant-tables &" && \
#   sleep 5 && \
#   mysql -u root -e "CREATE DATABASE dcms" && \
#   mysql -u root mydb < /tmp/dump.sql

COPY dump.sql /docker-entrypoint-initdb.d/