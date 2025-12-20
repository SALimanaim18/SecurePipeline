FROM php:8.2-apache

RUN a2enmod rewrite

# Installer mysqli et pdo_mysql
RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN docker-php-ext-enable mysqli pdo pdo_mysql

COPY . /var/www/html
RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 755 /var/www/html

RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

EXPOSE 80
