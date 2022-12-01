FROM nginx:perl

USER root

RUN apt-get update && apt-get -y upgrade

# install sury repo
RUN \
    apt-get install -y lsb-release ca-certificates apt-transport-https software-properties-common gnupg2 && \
    echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" | tee /etc/apt/sources.list.d/sury-php.list && \
    curl -fsSL  https://packages.sury.org/php/apt.gpg | gpg --dearmor -o /etc/apt/trusted.gpg.d/sury-keyring.gpg && \
    apt-get update

# install php
RUN \
    apt-get install php8.1 php8.1-\(fpm\|curl\|dom\|xml\|json\|session\|tokenizer\|bcmath\|ctypes\|mysqli\|pgsql\) -y

RUN systemctl enable php8.1-fpm.service

COPY ./nginx.conf/start_php.sh /docker-entrypoint.d/40-start-php.sh
RUN chmod oag+x /docker-entrypoint.d/40-start-php.sh

# give nginx permissions to use php fpm socket
RUN mkdir -p /var/run/php && \
    chown -R nginx:nginx /var/run/php && \
    chmod o+rwx /var/run/php

# install composer
RUN apt-get install composer -y

EXPOSE 80
