FROM ubuntu:21.04

WORKDIR /var/www/html

# Disable Prompt During Packages Installation
ARG DEBIAN_FRONTEND=noninteractive

RUN apt-get update \
    && apt-get install -y apache2 gnupg gosu curl ca-certificates zip unzip git supervisor  libcap2-bin libpng-dev \
    && mkdir -p ~/.gnupg \
    && chmod 600 ~/.gnupg \
    && echo "disable-ipv6" >> ~/.gnupg/dirmngr.conf \
    && apt-key adv --homedir ~/.gnupg --keyserver hkp://keyserver.ubuntu.com:80 --recv-keys E5267A6C \
    && apt-key adv --homedir ~/.gnupg --keyserver hkp://keyserver.ubuntu.com:80 --recv-keys C300EE8C \
    && echo "deb http://ppa.launchpad.net/ondrej/php/ubuntu hirsute main" > /etc/apt/sources.list.d/ppa_ondrej_php.list \
    && apt-get update \
    && apt-get install -y php8.0-cli php8.0-dev libapache2-mod-php8.0 \
       php8.0-pgsql php8.0-sqlite3 php8.0-gd \
       php8.0-curl php8.0-memcached \
       php8.0-imap php8.0-mysql php8.0-mbstring \
       php8.0-xml php8.0-zip php8.0-bcmath php8.0-soap \
       php8.0-intl php8.0-readline php8.0-pcov \
       php8.0-msgpack php8.0-igbinary php8.0-ldap \
    && php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer \
    && curl -sL https://deb.nodesource.com/setup_16.x | bash - \
    && apt-get install -y nodejs \
    && curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | apt-key add - \
    && echo "deb https://dl.yarnpkg.com/debian/ stable main" > /etc/apt/sources.list.d/yarn.list \
    && apt-get update \
    && apt-get install -y vim \
    && apt-get install -y yarn \
    && apt-get install -y mysql-server \
    && apt-get -y autoremove \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

RUN a2enmod php8.0 \
    && a2enmod rewrite \
    && sed -i 's#AllowOverride [Nn]one#AllowOverride All#' /etc/apache2/apache2.conf \
    && service apache2 restart

RUN chown -R www-data:www-data /var/www/html

EXPOSE 8000
ENTRYPOINT ["/usr/sbin/apachectl"]
CMD ["-D", "FOREGROUND"]
