FROM ngnix

RUN apt-get update && apt-get install -y nginx vim nano

COPY nginx.conf /etc/nginx/nginx.conf
COPY pp-api.conf /etc/nginx/sites-avaiable/pp-api.conf

RUN mkdir /etc/nginx/sites-enabled
RUN ln -s /etc/nginx/sites-available/pp-api.conf /etc/nginx/sites-enabled/pp-api.conf
RUN usermod -u 1000 www-data

EXPOSE 80
EXPOSE 443

CMD ["nginx"]

