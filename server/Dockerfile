FROM nginx

LABEL maintainer="blek! <me@blek.codes>"

RUN apt update && \
    apt install -y lsb-release ca-certificates apt-transport-https software-properties-common gnupg2 curl && \
    echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" | tee /etc/apt/sources.list.d/sury-php.list && \
    curl -fsSL  https://packages.sury.org/php/apt.gpg| gpg --dearmor -o /etc/apt/trusted.gpg.d/sury-keyring.gpg

RUN apt update && \
    apt -y install php8.1 \
    php8.1-fpm php8.1-bcmath php8.1-ctype php8.1-curl \
    php8.1-dom php8.1-fileinfo php8.1-mbstring \
    php8.1-cgi php8.1-pdo php8.1-mysql php8.1-pgsql \
    php8.1-tokenizer php8.1-xml \
    php8.1-gd php8.1-imagick \
    php8.1-cli && \
    ln -s /etc/init.d/php8.1-fpm /etc/rc.d

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
    php -r "if (hash_file('sha384', 'composer-setup.php') === '55ce33d7678c5a611085589f1f3ddf8b3c52d662cd01d4ba75c0ee0459970c2200a51f492d557530c71c15d8dba01eae') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" && \
    php composer-setup.php && \
    rm composer-setup.php && \
    mv composer.phar /usr/bin/composer

COPY 40-start-php-fpm.sh /docker-entrypoint.d
