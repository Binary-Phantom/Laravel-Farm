#!/bin/bash
# start.sh - executa Artisan e inicia Apache em produção

# Gera chave de aplicativo se não existir
if ! php artisan key:show > /dev/null 2>&1; then
    php artisan key:generate
fi

# Cache de configuração, rotas e views
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Inicia Apache no foreground
apache2-foreground