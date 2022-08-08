FROM kytel0925/php:8.1-debian-apache-dev

RUN curl -fsSL https://deb.nodesource.com/setup_14.x | bash - \
    && apt-get install -y nodejs

# now with everything ready we can create out php-app container
# this a dev container no code is needed
WORKDIR /app
COPY . .

RUN chmod -R 777 storage \
    /app/storage \

#expose the ports
EXPOSE 80
EXPOSE 443

#all done enjoy your php app docker machine
CMD ["/sbin/entrypoint.sh"]

#repository: https://hub.docker.com/repository/docker/kytel0925/php/tags?page=1&ordering=last_updated&name=8.1-debian-apache
