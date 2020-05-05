FROM node:14.1.0

WORKDIR /usr/src/app

COPY package.json /usr/src/app

COPY process.json /usr/src/app

COPY . /usr/src/app

RUN npm install

RUN npm install nodemon -g
RUN npm install node-babel -g

RUN npm install generate-export-aliases

EXPOSE 3000

#CMD ["pm2-docker", "start", "process.json"]
CMD ["npm", "start"]
