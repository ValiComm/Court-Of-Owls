FROM billiam13s/symfony-requirements:7.0

ARG GITHUB_ACCESS_TOKEN
ARG BUNDLE_NAME
ARG BUNDLE_FORMAT

ENV SYS_DEPS \
        git \
        unzip

RUN set -xe \
        && apt-get update \
        && apt-get install -y --no-install-recommends \
            $SYS_DEPS \
        && curl -LsS https://symfony.com/installer -o /usr/local/bin/symfony \
        && chmod a+x /usr/local/bin/symfony \
        && curl -sS https://getcomposer.org/installer | php \
        && mv composer.phar /usr/local/bin/composer

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

COPY docker-entrypoint /usr/local/bin/

ENTRYPOINT ["docker-entrypoint"]

CMD ["bash"]
