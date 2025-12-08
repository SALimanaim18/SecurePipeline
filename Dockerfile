# Image officielle PHP avec Apache
FROM php:8.2-apache

# Activer les modules Apache nécessaires
RUN a2enmod rewrite

# Installer les extensions PHP nécessaires (adapte selon ton projet)
RUN docker-php-ext-install pdo pdo_mysql

# Copier le code de l'application dans le conteneur
COPY . /var/www/html/

# Donner les bons droits
RUN chown -R www-data:www-data /var/www/html

# Exposer le port
EXPOSE 80

# Commande par défaut : démarrer Apache
CMD ["apache2-foreground"]
