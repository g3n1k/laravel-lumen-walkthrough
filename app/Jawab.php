<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class Jawab extends Model
{
    protected $collection = 'survey';
    protected $fillable = ['survey_id','biodata_id','jawab'];

}

