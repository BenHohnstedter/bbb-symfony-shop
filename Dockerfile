FROM php:8.2-apache
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Install GD extension with JPEG and PNG support
RUN apt-get update \
    && apt-get install -y libfreetype6-dev libjpeg62-turbo-dev libpng-dev \
    # configure the GD extension to include support for JPEG and PNG image formats
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd

# Install GD extension with WEBP, JPEG and PNG support
RUN apt-get update \
    && apt-get install -y libfreetype6-dev libjpeg62-turbo-dev libpng-dev libwebp-dev \
    # configure the GD extension to include support for WEBP, JPEG and PNG image formats
    && docker-php-ext-configure gd --with-webp --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd