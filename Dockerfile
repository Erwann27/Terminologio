FROM php:8.3-apache
WORKDIR /app
COPY . /app
RUN apt-get -y update && apt-get -y install \
    git \
    zip \
    unzip \
    && rm -rf /var/lib/apt/lists/* \
    && apt-get -y autoremove
RUN docker-php-ext-install pdo_mysql opcache \
    && docker-php-ext-enable pdo_mysql opcache \
    && echo ServerName 0.0.0.0 >> /etc/apache2/apache2.conf
###> recipes ###
###< recipes ###
EXPOSE 8000