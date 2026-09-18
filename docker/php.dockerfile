FROM dunglas/frankenphp:php8.3 as php

WORKDIR /var/www

# pcntl (requerido por Octane) y zip (requerido por Composer)
RUN install-php-extensions pcntl zip

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

EXPOSE 8000

ENTRYPOINT ["./docker/entrypoint.sh"]