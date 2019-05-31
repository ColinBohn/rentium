FROM bkuhl/fpm-nginx:latest

WORKDIR /var/www/html

# Copy the application files to the container
ADD --chown=www-data:www-data  . /var/www/html

ADD server.conf /etc/nginx/conf.d/server.conf

USER www-data

RUN touch database/database.sqlite

    # production-ready dependencies
RUN composer install  --no-interaction --optimize-autoloader --prefer-dist \

    # keep the container light weight
    && rm -rf /home/www-data/.composer/cache \

    # create tables and sample data in database
    && php artisan migrate --seed

USER root