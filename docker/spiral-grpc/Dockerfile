FROM php:8.3-fpm-alpine

# Install Supervisor and other dependencies
RUN apk add --no-cache \
    supervisor \
    libzip-dev \
    libpng-dev \
    oniguruma-dev \
    libxml2-dev \
    curl-dev \
    freetype-dev \
    openssl-dev \
    mysql-client \
    git \
    curl \
    zip \
    unzip \
    libxrender \
    fontconfig \
    icu-dev \
    $PHPIZE_DEPS

# Install necessary PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl bcmath xml dom curl gd intl

# Install redis
RUN pecl install redis && docker-php-ext-enable redis

# Copy composer.lock and composer.json to the working directory
COPY . /var/www/

# Disable error output
RUN echo "display_errors = off" >> /usr/local/etc/php/conf.d/docker-php-error.ini;

# Increase PHP default values
RUN echo "memory_limit = 2048M" >> /usr/local/etc/php/conf.d/docker-php-memlimit.ini; \
    echo "post_max_size = 40M" >> /usr/local/etc/php/conf.d/docker-php-memlimit.ini; \
    echo "upload_max_filesize = 40M" >> /usr/local/etc/php/conf.d/docker-php-memlimit.ini;

# Configure opcache
RUN echo "opcache.memory_consumption=512" >> /usr/local/etc/php/conf.d/opcache.ini; \
    echo "opcache.interned_strings_buffer=8" >> /usr/local/etc/php/conf.d/opcache.ini; \
    echo "opcache.max_accelerated_files=20000" >> /usr/local/etc/php/conf.d/opcache.ini; \
    echo "opcache.revalidate_freq=0" >> /usr/local/etc/php/conf.d/opcache.ini; \
    echo "opcache.fast_shutdown=1" >> /usr/local/etc/php/conf.d/opcache.ini; \
    echo "opcache.enable_cli=1" >> /usr/local/etc/php/conf.d/opcache.ini; \
    echo "opcache.enable=1" >> /usr/local/etc/php/conf.d/opcache.ini;

# Set the working directory
WORKDIR /var/www

# Use Composer to install the application's PHP dependencies
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --no-interaction

# Copy Supervisor configuration file
COPY /docker/supervisor/danapay.conf /etc/supervisor/conf.d/danapay.conf

# Copy start script
COPY /docker/bootstrap/start_prod.sh /usr/local/bin/start.sh
RUN chmod +x /usr/local/bin/start.sh

# Expose port 9000 and start Supervisor
EXPOSE 9002
CMD ["/usr/local/bin/start.sh", "-c", "/etc/supervisor/conf.d/danapay.conf"]
