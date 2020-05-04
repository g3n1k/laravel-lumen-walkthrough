## provide mongodb service
using docker-compose to provide mongodb service,
i want build the structure become less coupling, 
the api can go anywhere mongodb services

lets pull docker mongo and mongo-express
````
docker pull mongo
docker pull mongo-express
````
create folder db and docker-composer file
````
cd ~/workspace/DATABASE
mkdir -p mongodb/db mongodb/logs && touch mongodb/database.env && touch mongodb/docker-compose.yml && touch mongodb/init-mongo.js
````
open file `database.env` and filled with 
````
MONGO_INITDB_DATABASE=test
MONGO_INITDB_ROOT_USERNAME=root
MONGO_INITDB_ROOT_PASSWORD=rootpwd

ME_CONFIG_MONGODB_ADMINUSERNAME=root
ME_CONFIG_MONGODB_ADMINPASSWORD=rootpwd
````

open file `docker-compose.yml` and filled with 
````
version: '3.4'

services:

  mongo:
    image: mongo
    container_name: gw_mongo
    ports:
      - '27017-27019:27017-27019'
    env_file:
      - ./database.env
    volumes:
      - ./init-mongo.js:/docker-entrypoint-initdb.d/init-mongo.js
      - ./db:/data/db
      
  mongo-express:
    image: mongo-express
    container_name: gw_mongo_express
    ports:
      - 8081:8081
    env_file:
      - ./database.env
````
now spin up mongo services
````
docker-compose up -d
````
access mongo-express with browser in [http://localhost:8081/](http://localhost:8081/)

or you can use robomongo
[https://robomongo.org/download](https://robomongo.org/download)

refs:  
 - [https://medium.com/faun/managing-mongodb-on-docker-with-docker-compose-26bf8a0bbae3](https://medium.com/faun/managing-mongodb-on-docker-with-docker-compose-26bf8a0bbae3)