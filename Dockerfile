FROM php:8.4-fpm

WORKDIR /var/www/html

RUN apt-get update && apt-get install -y --no-install-recommends \
    git \
    vim \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libyaml-dev \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd \
    && pecl install yaml \
    && docker-php-ext-enable yaml \
    && pecl clear-cache

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y --no-install-recommends nodejs \
    && rm -rf /var/lib/apt/lists/* \
    && npm install -g npm@latest \
    && npm cache clean --force

RUN groupadd -g 1000 www \
    && useradd -u 1000 -ms /bin/bash -g www www

COPY --chown=www:www . /var/www/html

USER www

EXPOSE 9000

CMD ["php-fpm"]