#!/bin/sh

mkdir /var/run/php
php-fpm8.1
chown -R nginx:nginx /var/run/php/php8.1-fpm.sock
chmod o+rwx /var/run/php/php8.1-fpm.sock

echo Started PHP FPM
