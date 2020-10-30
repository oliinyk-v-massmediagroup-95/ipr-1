FROM php:7.4-fpm

WORKDIR /var/www

#ext
RUN apt-get update && apt-get install -y  \
        libzip-dev \
        libldb-dev \
        libldap2-dev \
        libicu-dev \
        libbz2-dev \
        zlib1g-dev \
        libpng-dev \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpq-dev \
        libxml2-dev \
        libxslt-dev \
        zlib1g-dev \
        curl \
        bash \
        git \
        nodejs \
        npm \
        zip unzip

#php-ext
RUN docker-php-ext-install bcmath \
            bz2 \
            calendar \
            exif \
            gd \
            intl \
            ldap \
            mysqli \
            opcache \
            pdo_mysql \
            pdo_pgsql \
            pgsql \
            soap \
            xsl \
            zip \
            sockets

#php-ext configure
RUN docker-php-ext-configure gd --with-freetype --with-jpeg

#composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

# Copy existing application directory contents
COPY . /var/www

# Copy existing application directory permissions
COPY --chown=www:www . /var/www

# Change current user to www
USER www

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]
