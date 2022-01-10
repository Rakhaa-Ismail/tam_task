# tam_task
<pre>
Hello!
The task aim to create phonebook application with spesific features: 

●    Add a name and associate it with either one number or more than one. 
●    Show a list of names.
●    Show a name with numbers associated with it.
●    The application should be dockerized.

I used Visual Studio Code editior and Docker to dockerized the app. 
I chose php programming langugaes and mySQL as a Database. 
And I use some of HTML tag for the browser. 
P.S. I didn't use css or bootstrap to make the inteface britter becouse it's not the point. 

However: 
I'll list some steps so how will gonna run the app can follow it: 

At the begining we need to create a Dockerfile in php project: 

Dockerfile contain first: 

FROM php:7.4-cli
COPY . /usr/src/myapp
WORKDIR /usr/src/myapp
CMD [ "php", “./php_app.php" ] 

after that we have to build and run the continer so we need to run these command in terminal: 
$ docker build -t my-php-app .
$ docker run -it --rm --name my-running-app my-php-app

then Apache without dockerfile by:  
$ docker run -d -p 3000:80 --name my-apache-php-app -v "$PWD":/var/www/html php:7.4-apache

then search local http://localhost:3000
it must print whatever in php file. 

"docker stop $(docker ps -a -q)" -> we may have to stop the docker in multiple steps becouse I faced issues. 

---------------------


then bulid the docker-compose file with this code: "the uploded file the last code contain and we have to build step by step" 
so I run this code first: 

version: '3.8'

services:
  php-apache-environment:
    image: php:7.4-apache
    volumes:
      - ./src:/var/www/html/
    ports:
      - 3000:80

  db:
        image: mysql
        command: --default-authentication-plugin=mysql_native_password
        restart: always
        environment:
            MYSQL_ROOT_PASSWORD: example


  adminer:
        image: adminer
        restart: always
        ports:
            - 8080:8080


then dockorized it: 
Docker-compose up -d 

mySQL DB must display after this step when search about http://localhost:8080 in the browser
The defualt username and password are: 
username: Root
Password: example 

I create a database called phonenumber_app with table called phone_number 
the attributes of the table are: 
first_name with text datatype "String" 
last_name with text datatype "String" 
phone_number with text datatype "int" length 10 

"the names must be the same to avoid errors in queries" 

after that we must down the docker to change the content of docker file and docker compose file as it's in the file above.

then Docker-compose up -d again. 
and add the required functions in php file.


</pre>
