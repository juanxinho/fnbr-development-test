# Dockerfile for Node.js backend

FROM node:latest


WORKDIR /app

COPY package.json .
COPY package-lock.json .

RUN npm install

COPY . .

ARG PORT
ENV PORT=${PORT}

EXPOSE ${PORT}


CMD ["npm", "start"]
