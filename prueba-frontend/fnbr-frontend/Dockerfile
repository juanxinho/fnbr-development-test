ARG NODE_VERSION=node:19.4.0-alpine 
FROM $NODE_VERSION AS dependency-base 
# create destination directory 
RUN mkdir -p /app 
WORKDIR /app 
# copy the app, note .dockerignore 
COPY package.json .
COPY package-lock.json .
RUN npm ci 
FROM dependency-base AS production-base 
# build will also take care of building # if necessary 
COPY . . 
RUN npm run build