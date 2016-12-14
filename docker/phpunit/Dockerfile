FROM php:7.0

ENV SYS_DEPS \
        git \
        unzip

RUN set -xe \
        && apt-get update \
        && apt-get install -y --no-install-recommends \
            $SYS_DEPS \
        && curl -sS https://getcomposer.org/installer | php \
        && mv composer.phar /usr/local/bin/composer

ENV PECL_DEPS \
        xdebug

RUN set -xe \
        && pecl install $PECL_DEPS \
        && docker-php-ext-enable $PECL_DEPS

RUN set -xe \
        && composer global require phpunit/phpunit

# clean up unneeded libs
RUN set -xe \
        && rm -rf /var/lib/apt/lists/* \
        && apt-get purge -y --auto-remove -o APT::AutoRemove::RecommendsImportant=false

ENV PATH "/root/.composer/vendor/bin:$PATH"
