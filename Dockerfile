FROM php:7.4-cli

WORKDIR /app

# Install dependencies
RUN apt-get update \
    && apt-get install -y \
        libcurl4 \
        curl \
        libzip-dev \
        zip \
        unzip \
        git \
        --no-install-recommends \
    && rm -rf /var/lib/apt/lists/*

# Install extensions
RUN docker-php-ext-install zip

# Install composer
RUN curl -sS https://getcomposer.org/installer  | php -- --install-dir=/usr/bin/ --filename=composer

# Install dependencies
RUN composer global require hirak/prestissimo
COPY composer.json composer.lock ./
RUN composer install -o

# Copy app
COPY . /app