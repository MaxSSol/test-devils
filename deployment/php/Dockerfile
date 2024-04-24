FROM php:8.1-fpm

RUN usermod  --uid 1000 www-data
RUN groupmod --gid 1001 www-data

RUN apt-get update && apt-get install -y --no-install-recommends \
    libpq-dev \
    nano

RUN docker-php-ext-install -j$(nproc) pdo_pgsql pgsql

RUN apt-get install zip unzip
RUN pecl install xdebug-3.1.4 && docker-php-ext-enable xdebug

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"
RUN echo "memory_limit = 1024M" >> "$PHP_INI_DIR/php.ini"
RUN echo "upload_max_filesize = 128M" >> "$PHP_INI_DIR/php.ini"
RUN echo "short_open_tag = On" >> "$PHP_INI_DIR/php.ini"
RUN echo "date.timezone = 'Europe/Kiev'" >> "$PHP_INI_DIR/php.ini"

CMD ["php-fpm"]
