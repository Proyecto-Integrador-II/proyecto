FROM ubuntu:latest

RUN apt-get update && apt-get install software-properties-common -y
RUN add-apt-repository ppa:ondrej/php && apt-get update && apt-get install php8.1 php-mysql -y
RUN groupadd -g 5000 -r app
RUN useradd -g 5000 -u 5000 -M -d /opt/app -s /sbin/nologin -r app
WORKDIR /opt/app
CMD php -S 0.0.0.0:8000