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

