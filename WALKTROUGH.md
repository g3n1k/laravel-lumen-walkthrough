# this my walktrough build api lumen
this goal to crud from db with lumen API, using lumen and mongodb 

## lumen install 
using [docs laravel 5.8](https://lumen.laravel.com/docs/5.8) have laptop with server requirement   

using composer to create project
````
cd ~/workspace/ori/asik/
composer create-project --prefer-dist laravel/lumen:5.8.* api
````

using php as server 
````
php -S localhost:8000 -t public 
````

create random string to fill `APP_KEY` in `.env` file, we need filled this value to generate pass which hashing
````
code routes/web.php
````
add the function in code
````
$router->get('/key', function(){ return str_random(32); });
````
save and exec with curl or browser
````
$ curl localhost:8000/key
Et7aM9Q9YYmqmFtkL1XPcCQiiDfZGfbP
code .env
````
copy the string and change to `KEY_VALUE=Et7aM9Q9YYmqmFtkL1XPcCQiiDfZGfbP`

