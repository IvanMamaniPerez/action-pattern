FROM alpine:3.20

# This arguments should be sync with the PHP version you want to use
ARG PHP_VERSION_USE_APK=83
ARG PHP_VERSION=8.3

WORKDIR /var/www

# Essentials
RUN echo "UTC" > /etc/timezone && \
    apk add --no-cache zip unzip curl && \
    apk add --no-cache bash && \
    sed -i 's/bin\/ash/bin\/bash/g' /etc/passwd && \
    apk add --no-cache php83 \
    php83-common \
    php83-fpm \
    php83-pdo \
    php83-opcache \
    php83-zip \
    php83-phar \
    php83-iconv \
    php83-cli \
    php83-curl \
    php83-openssl \
    php83-mbstring \
    php83-tokenizer \
    php83-fileinfo \
    php83-json \
    php83-xml \
    php83-xmlwriter \
    php83-simplexml \
    php83-dom \
    php83-pdo_mysql \
    php83-pdo_pgsql \
    php83-pdo_sqlite \
    php83-tokenizer \
    php83-posix \
    php83-pcntl \
    php83-gd \
    php83-intl \
    php83-session
    # libc6-compat && \ 
RUN rm -f /usr/bin/php && ln -s /usr/bin/php83 /usr/bin/php && \
    curl -sS https://getcomposer.org/installer -o composer-setup.php && \
    php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && rm -rf composer-setup.php

    # Habilitar la extensión session (si ya está compilada)
RUN echo "extension=session.so" > /etc/php83/conf.d/00_session.ini
# Building process
COPY . .

# RUN composer install # Se esta ejecutando en el supervisord.conf 
RUN composer install

CMD ["tail", "-f", "/dev/null"]