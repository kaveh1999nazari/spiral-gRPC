# Base image.
FROM php:8.3-cli

# Install system dependencies and update the system.
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libcurl4-openssl-dev \
    libfreetype6-dev \
    libssl-dev \
    supervisor \
    libpq-dev \
    postgresql-client-common \
    xvfb \
    protobuf-compiler \
    libgrpc-dev \
    libprotobuf-dev \
    libfontconfig

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-configure gd --with-freetype=/usr/include/
RUN docker-php-ext-install -j$(nproc) gd
RUN docker-php-ext-install pdo pdo_pgsql mbstring zip exif pcntl bcmath xml intl
RUN pecl install redis
RUN docker-php-ext-enable redis

#install GRPC
RUN pecl install grpc protobuf \
    && docker-php-ext-enable grpc protobuf

# install php:mysql
RUN docker-php-ext-install pdo_mysql

# Configure PHP
RUN sed -i -e "s/upload_max_filesize = .*/upload_max_filesize = 40M/g" \
        -e "s/post_max_size = .*/post_max_size = 40M/g" \
        -e "s/memory_limit = .*/memory_limit = 2048M/g" \
        /usr/local/etc/php/php.ini-production && \
        cp /usr/local/etc/php/php.ini-production /usr/local/etc/php/php.ini

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Supervisor
COPY docker/supervisor/spiral_gRPC_local.conf /etc/supervisor/conf.d/supervisord.conf
CMD ["/usr/bin/supervisord", "-n"]

WORKDIR /var/www
EXPOSE 9002
