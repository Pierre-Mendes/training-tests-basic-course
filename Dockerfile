FROM php:8.4-fpm

ARG user=pierremendess
ARG uid=1000

# Install basics dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install extensions PHP
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd sockets

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Create user
RUN useradd -G www-data,root -u $uid -d /home/$user $user \
    && mkdir -p /home/$user/.composer \
    && chown -R $user:$user /home/$user

RUN git config --global --add safe.directory /var/www && \
    chown -R www-data:www-data /var/www && \
    chmod -R 755 /var/www

WORKDIR /var/www

# Copy the content from project
COPY . .

#Install Composer Dependencies
RUN composer install

# Use the created user
USER $user
