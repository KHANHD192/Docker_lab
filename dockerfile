FROM ubuntu:latest 

ENV DEBIAN_FRONTEND=noninteractive
# Cập nhật danh sách gói và cài đặt Apache, PHP và các gói mở rộng cần thiết
RUN apt-get update && apt-get install -y apache2 php libapache2-mod-php php-mysql --no-install-recommends


# Enable module rewrite cho Apache
RUN a2enmod rewrite


RUN rm -rf /var/www/html/ 
COPY ./src /var/www/html 
RUN chmod -R 777 /var/log/apache2/
EXPOSE 80

CMD ["apache2ctl", "-D", "FOREGROUND"]