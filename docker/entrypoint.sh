#!/bin/bash

if [ ! -f "vendor/autoload.php" ]; then
    echo "Composer install for '$APP_ENV' environment"
    if [ "$APP_ENV" == "local" ]; then
        composer install --no-progress --no-interaction
    else
        composer install --no-ansi --no-dev --no-scripts --no-plugins --no-progress --no-interaction --optimize-autoloader
    fi
fi


echo "#####################"
if [ "$APP_ENV" == "testing" ]; then
    echo "!!!!!!!!!CONTAINER UP FOR TESTING!!!!!!!!!!!!"
fi

echo "APP_ENV=$APP_ENV"
echo "BUILD_ROLE=$BUILD_ROLE"
echo "Server_name definido en .env: $SERVER_NAME"
echo "Sistema '$SERVER_NAME' desplegado en '$BUILD_ENV' a la hora $(date)"
echo "#####################"

if [ "$BUILD_ROLE" == "app" ]; then
   
    #Create storage folder if not exists.
    mkdir -p ./storage
    mkdir -p ./storage/logs
    mkdir -p ./storage/framework
    mkdir -p ./storage/framework/sessions
    mkdir -p ./storage/framework/cache/data
    mkdir -p ./storage/framework/testing
    mkdir -p ./storage/framework/views

    if [ "$APP_ENV" != "local" ]; then
        echo "Applying file permisions"
        # Fix files ownership.
        chown -R www-data .
        chown -R www-data ./storage
        chown -R www-data ./bootstrap
        chown -R www-data ./vendor

        # Set correct permission.
        chmod -R 775 ./storage
        chmod -R 775 ./bootstrap
        chmod -R 775 ./vendor
    else
        echo "LOCAL env, ommit file permissions setup"
    fi

    # Laravel artisan commands
    php artisan clear
    php artisan optimize:clear
    #php artisan key:generate
    php artisan cache:clear
    php artisan config:clear
    php artisan route:clear

    if [ ! -f "frankenphp" ]; then
        php artisan octane:install --server=frankenphp --no-interaction
    fi

    exec php artisan octane:start --server=frankenphp --host=0.0.0.0 --port=8000 --max-requests=500
fi