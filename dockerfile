FROM ubuntu:latest

ENV DEBIAN_FRONTEND=noninteractive

RUN apt-get -o Acquire::Check-Valid-Until=false -o Acquire::Check-Date=false update

RUN apt-get install -y apache2 php libapache2-mod-php --no-install-recommends
RUN apt-get install -y python3 python3-pip
RUN echo "\nServerName 127.0.0.1" >> /etc/apache2/apache2.conf
RUN apt-get update && \
    apt-get install -y apt-transport-https ca-certificates curl software-properties-common
RUN curl -fsSL https://download.docker.com/linux/ubuntu/gpg | apt-key add - && \
    add-apt-repository "deb [arch=amd64] https://download.docker.com/linux/ubuntu $(lsb_release -cs) stable"
RUN apt-get update && \
    apt-get install -y docker-ce docker-ce-cli containerd.io
RUN service apache2 restart
RUN a2enmod rewrite

RUN rm -rf /var/www/html/

COPY ./src /var/www/html/

COPY ./script /
 
RUN useradd -G docker user_docker
RUN echo "user_docker:qaz@123" |chpasswd 
RUN chmod -R 777 /var/log/apache2/

RUN chmod +x entrypoint.sh
EXPOSE 80

