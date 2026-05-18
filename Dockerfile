FROM php:8.4-cli

WORKDIR /app

# Install system packages
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    libzip-dev \
    libssl-dev \
    pkg-config

# Install PHP extensions
RUN docker-php-ext-install zip

# Install MongoDB extension
RUN pecl install mongodb && docker-php-ext-enable mongodb

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy project files
COPY . .

# Install dependencies
RUN composer install

# Expose port
EXPOSE 8000

# Run Laravel
CMD php artisan config:clear && php artisan cache:clear && php artisan db:seed --force && php artisan serve --host=0.0.0.0 --port=8000