# docker build -t cauciones .
# docker run -p 8000:8000 -v "$(pwd):/cauciones" cauciones

# base image
FROM php:7.4.16-apache

COPY --from=node:15.13.0-alpine3.10 . .

# root privileges
USER root
WORKDIR /cauciones


# apt-get
RUN apt-get update
RUN apt-get -y install bzip2 vim wget zip unzip libpq-dev
RUN apt-get -y install libmcrypt-dev libzip-dev zziplib-bin zlib1g-dev


# docker-php ext-install
RUN docker-php-ext-install zip
RUN docker-php-ext-install pdo pdo_pgsql pgsql

# composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
