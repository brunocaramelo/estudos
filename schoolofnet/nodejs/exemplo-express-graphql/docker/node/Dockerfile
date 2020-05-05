FROM node:latest

WORKDIR /usr/src/app

COPY package.json /usr/src/app

COPY process.json /usr/src/app

RUN npm install

COPY . /usr/src/app

RUN npm install pm2 -g

RUN npm install generate-export-aliases

EXPOSE 3000

CMD ["pm2-docker", "start", "process.json"]
