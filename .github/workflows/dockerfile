# Utilisation de l'image PHP avec Apache
FROM php:8.2-apache

# Installation des extensions nécessaires pour Laravel
RUN apt-get update && apt-get install -y \
libpng-dev \
libjpeg-dev \
libfreetype6-dev \
zip \
unzip \
git \
&& docker-php-ext-configure gd --with-freetype --with-jpeg \
&& docker-php-ext-install gd pdo pdo_mysql
# Activation du module rewrite d'Apache
RUN a2enmod rewrite
# Définition du répertoire de travail
WORKDIR /var/www/html
# Copie du code source
COPY . .
# Installation de Composer (outil pour les dépendances PHP)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --no-interaction --optimize-autoloader
# Permissions pour Laravel
RUN chown -R www-data:www-data storage bootstrap/cache