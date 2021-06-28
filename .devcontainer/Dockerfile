FROM php:7.4-fpm

RUN apt-get update && apt-get install -y \
		ca-certificates \
		curl \
		libbz2-dev \
		libcurl4-gnutls-dev \
		libgmp-dev \
		libpng++-dev \
		libpq-dev \
		libsqlite3-dev \
		libxml2-dev \
		re2c \
		sqlite3	\
        file \
        git \
        graphviz \
        libexif-dev \
        libgd-dev \
        libjpeg-dev \
        libjpeg62-turbo-dev \
        libmagic-dev \
        libmcrypt-dev \
        libonig-dev \
        libpng-dev \
        libssh2-1-dev \
        libssl-dev \
        libtidy-dev \
        libvpx-dev \
        libxml2-dev \
        libxslt1-dev \
        libzip-dev \
        wget	\
        zlib1g-dev \
	&& docker-php-ext-install json \
	&& docker-php-ext-install mbstring \
	&& docker-php-ext-install tokenizer \
    && docker-php-ext-install gmp \
    && docker-php-ext-install gd \
	&& docker-php-ext-install curl \
	&& docker-php-ext-install dom \
	&& docker-php-ext-install bz2 \
	&& docker-php-ext-install mysqli \
	&& docker-php-ext-install pcntl \
	&& docker-php-ext-install pdo \
	&& docker-php-ext-install pdo_mysql \
	&& docker-php-ext-install phar \
	&& docker-php-ext-install posix \
	&& docker-php-ext-install simplexml \
	&& docker-php-ext-install soap \
	&& docker-php-ext-install sockets \
	&& docker-php-ext-install tidy \
	&& docker-php-ext-install zip \
	&& docker-php-ext-install bcmath \
	&& docker-php-ext-install calendar \
	&& docker-php-ext-install ctype \
	&& docker-php-ext-install exif \
	&& docker-php-ext-install pcntl \
	&& docker-php-ext-install pdo_sqlite \
	&& docker-php-ext-install pdo pdo_pgsql

# Install Node
ARG NODE_VERSION=15.14.0
ARG NODE_PACKAGE=node-v$NODE_VERSION-linux-x64
ARG NODE_HOME=/opt/$NODE_PACKAGE

ENV NODE_PATH $NODE_HOME/lib/node_modules
ENV PATH $NODE_HOME/bin:$PATH

RUN curl https://nodejs.org/dist/v$NODE_VERSION/$NODE_PACKAGE.tar.gz | tar -xzC /opt/

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

#Install xdebug
RUN pecl install xdebug-3.0.4 && docker-php-ext-enable xdebug

COPY ./php/xdebug.ini /usr/local/etc/php/conf.d/

RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

RUN mkdir -p /var/www/storage/logs

RUN chown www:www /var/www/storage/logs

USER www

EXPOSE 9000

CMD ["php-fpm"]
