FROM billiam13s/symfony-requirements:7.0-fpm

ENV PECL_DEPS \
        xdebug

RUN set -xe \
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
