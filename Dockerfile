FROM php:8.2-cli

RUN apt-get update \
    && apt-get install -y libsqlite3-dev \
    && docker-php-ext-install pdo pdo_sqlite \
    && rm -rf /var/lib/apt/lists/*

COPY . /usr/src/php-api

WORKDIR /usr/src/php-api

CMD ["php", "-S", "0.0.0.0:8000", "src/server.php"]