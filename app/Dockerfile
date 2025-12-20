FROM php:8.2-apache

RUN a2enmod rewrite

# Installer mysqli et pdo_mysql
RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN docker-php-ext-enable mysqli pdo pdo_mysql

# Introduire une version vulnérable volontaire d'un paquet système
RUN apt-get update && apt-get install -y curl=7.58.0-2ubuntu3.16

COPY . /var/www/html
RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 755 /var/www/html

RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

EXPOSE 80
