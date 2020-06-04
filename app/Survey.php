<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class Survey extends Model
{
    protected $collection = 'survey';
    protected $fillable = ['title','description','survey'];

}

