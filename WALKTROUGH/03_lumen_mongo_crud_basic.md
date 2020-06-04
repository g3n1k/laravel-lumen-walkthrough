# crud basic lumen mongodb
crud in laravel can be build with 3 component
route, model, controller i dont if we need view in api server

## create model
we will using previous model (Course)  
````
code app/Course.php
````
## provide 'test' route
````
code routes/web.php
````
add resource to route
````
$router->get('course', 'CourseController@index');
````





make sure php mongodb extention have installed
````
sudo apt-get install php7.3-mongodb
````
install component via mongodb
````
cd ~/workspace/ori/asik
composer require jenssegers/mongodb:3.5.*
````
register to service provider
````
code bootstrap/app.php
````
add value
````
$app->withFacades();
$app->register(Jenssegers\Mongodb\MongodbServiceProvider::class);
$app->withEloquent();
````
add config database
````
code config/database.php
````
add value
````
<?php
    return [
        'default' => 'mongodb',
        'connections' => [
            'mongodb' => [ 
                'driver' => 'mongodb',
                'host' => env('MONGO_HOST', 'localhost'),
                'port' => env('MONGO_PORT', 27017),
                'database' => env('MONGO_DATABASE'),
                'username' => env('MONGO_USERNAME'),
                'password' => env('MONGO_PASSWORD'),
                'options' => [
                    'database' => 'admin' // sets the authentication database required by mongo 3
                ]
            ],
        ],
        'migrations' => 'migrations',
    ];
````
my `.env` value file 
````
APP_NAME=Lumen
APP_ENV=local
APP_KEY=Et7aM9Q9YYmqmFtkL1XPcCQiiDfZGfbP
APP_DEBUG=true
APP_URL=http://localhost
APP_TIMEZONE=UTC

LOG_CHANNEL=stack
LOG_SLACK_WEBHOOK_URL=

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret

CACHE_DRIVER=file
QUEUE_CONNECTION=sync

MONGO_HOST=localhost
MONGO_PORT=27017
MONGO_DATABASE=ori_api
MONGO_USERNAME=root
MONGO_PASSWORD=rootpwd
````

now lets test if we can write to mongo via lumen  
we create some model lets says Course  
````
code app/Course.php
````
fill with code
````
<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class Course extends Model
{
    protected $collection = 'courses';
    protected $fillable = ['_id_users','title','short_description','description','category','required','price','cover','capacity','open_date','close_date','type','event_date'];

    public function user()
    {
        return $this->hasOne(User::class, '_id', '_id_users');
    }
}
````
lest make it simple, test in route
````
code routes/web.php
````
add code in bottom
````
// add in top
use DB;
use App\Course;

....
....

// test input to mongodb
$router->get('/testdb/{title}', function ($title) {

    dd('test', Course::create(['title'=>$title])); // dummy dump
});
````

test using browser `http://localhost:8000/testdb/XYZ`

cek using [robomongo](https://robomongo.org/download) as client db  

![alt text][logo]

[logo]: img/03_robomongo.png "Logo Title Text 2"
