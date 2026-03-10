#!/bin/bash
# start.sh - roda Artisan e Apache em produção

# Garante chave do app

mkdir -p storage/logs storage/framework/views bootstrap/cache
chmod -R 777 storage bootstrap/cache

if ! php artisan key:show > /dev/null 2>&1; then
    php artisan key:generate
fi

# Limpa e cria caches
php artisan config:clear
php artisan route:clear
php artisan view:clear

php artisan config:cache
php artisan route:cache
php artisan view:cache

# Inicia Apache
apache2-foreground