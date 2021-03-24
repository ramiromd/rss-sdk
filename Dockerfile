FROM php:7.4.15-cli-buster

WORKDIR /usr/src/sdk
COPY . /usr/src/sdk

RUN apt-get update \
    && DEBIAN_FRONTEND=noninteractive apt-get install -y \
    curl git vim wget zip unzip zlib1g-dev libzip-dev libxml2 \
    libxml2-dev libcurl4-gnutls-dev

RUN docker-php-ext-install zip dom curl

RUN wget https://getcomposer.org/installer -O /tmp/composer-setup
RUN php /tmp/composer-setup
RUN mv /usr/src/sdk/composer.phar /bin/composer
RUN composer -V
RUN composer install

CMD ["php", "-a"]