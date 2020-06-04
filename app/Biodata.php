<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class Biodata extends Model
{
    protected $collection = 'survey';
    protected $fillable = ['biodata_id','jawab'];
}

