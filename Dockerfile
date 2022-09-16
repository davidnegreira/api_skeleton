FROM php:8.1-apache

ENV APACHE_DOCUMENT_ROOT /var/www/html/public

RUN apt-get update \
    && apt-get -y install libicu-dev \
                          libzip-dev \
                          unzip \
                          $PHPIZE_DEPS \
    && docker-php-ext-install pcntl bcmath intl zip \
    && sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf \
    && sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf \
    && a2enmod rewrite

EXPOSE 80
CMD ["apache2-foreground"]