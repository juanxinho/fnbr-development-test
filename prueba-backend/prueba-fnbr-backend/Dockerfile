FROM kytel0925/php:8.1-debian-apache-dev
USER root

# now with everything ready we can create out php-app container
# this a dev container no code is needed
WORKDIR /app
COPY . .
RUN chmod -R 777 ./
#expose the ports
EXPOSE 80
EXPOSE 443

#all done enjoy your php app docker machine
CMD ["/sbin/entrypoint.sh"]