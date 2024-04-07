FROM ubuntu:latest

ENV DEBIAN_FRONTEND=noninteractive

RUN apt-get -o Acquire::Check-Valid-Until=false -o Acquire::Check-Date=false update

RUN apt-get install -y apache2 php libapache2-mod-php --no-install-recommends

RUN echo "\nServerName 127.0.0.1" >> /etc/apache2/apache2.conf

RUN service apache2 restart

RUN a2enmod rewrite

RUN rm -rf /var/www/html/

COPY ./src /var/www/html

COPY ./script /

RUN chmod -R 777 /var/log/apache2/

RUN chmod +x entrypoint.sh

EXPOSE 80

