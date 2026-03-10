#!/bin/bash
# start.sh - roda Artisan e Apache em produção

# Garante que as pastas de logs e cache existem
mkdir -p storage/logs storage/framework/views bootstrap/cache
chmod -R 777 storage bootstrap/cache

# Garante chave do app
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

# Roda migrations antes do app iniciar
php artisan migrate --force

# Inicia Apache
apache2-foreground