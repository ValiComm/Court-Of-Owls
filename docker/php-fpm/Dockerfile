FROM php:7.0-fpm

ENV SYS_DEPS \
        libicu-dev

ENV BUILD_DEPS \
        libssl-dev

ENV PHP_DEPS \
        intl \
        opcache

ENV PECL_DEPS \
        xdebug

RUN set -xe \
        && apt-get update \
        && apt-get install -y --no-install-recommends \
            $SYS_DEPS \
            $BUILD_DEPS \
        && docker-php-ext-install -j$(nproc) $PHP_DEPS \
        && pecl install $PECL_DEPS \
        && docker-php-ext-enable $PECL_DEPS

## mysql setup
#ENV MYSQL_DEPS \
#        pdo \
#        pdo_mysql
#
#RUN set -xe \
#        && docker-php-ext-install -j$(nproc) $MYSQL_DEPS

## mongo setup
#ENV MONGO_DEPS \
#        mongodb
#
#RUN set -xe \
#        && pecl install $MONGO_DEPS \
#        && docker-php-ext-enable $MONGO_DEPS

# clean up unneeded libs
RUN set -xe \
        && rm -rf /var/lib/apt/lists/* \
        && apt-get purge -y --auto-remove -o APT::AutoRemove::RecommendsImportant=false
