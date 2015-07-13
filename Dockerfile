FROM alpine
MAINTAINER hitalos <hitalos@gmail.com>

RUN apk update && apk upgrade
RUN apk add bash apache2 php-apache2

RUN apk add php-curl php-json php-mcrypt php-openssl php-pdo php-pdo_sqlite \
	php-phar php-sqlite3 php-zip php-zlib sqlite

RUN sed -i -e 's/DocumentRoot.*/DocumentRoot \/var\/www\/localhost\/webroot/' /etc/apache2/httpd.conf
RUN sed -i -e 's/<Directory "\/var\/www\/localhost\/htdocs">/<Directory "\/var\/www\/localhost">/' /etc/apache2/httpd.conf
RUN sed -i -e 's/zlib.output_compression = Off/zlib.output_compression = On/' /etc/php/php.ini

CMD /usr/sbin/httpd -D FOREGROUND
