# Migrate the database
php artisan migrate --force

# Set the correct permissions
chown -R www-data:www-data /var/www/storage
chmod -R 775 /var/www/storage

# Run the supervisor process
/usr/bin/supervisord
