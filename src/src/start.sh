#!/bin/bash

mkdir -p storage/logs storage/framework/views bootstrap/cache
chmod -R 777 storage bootstrap/cache
#resolve alguns conflitos caso n suba na ordem certa, e o vendor seja excluido antes 
if [ ! -d "vendor" ]; then
    composer install
fi

if ! php artisan key:show > /dev/null 2>&1; then
    php artisan key:generate
fi

php artisan config:clear
php artisan route:clear
php artisan view:clear

php artisan migrate --force

apache2-foreground