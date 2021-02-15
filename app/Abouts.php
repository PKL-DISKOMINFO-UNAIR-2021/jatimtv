<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Abouts extends Model
{
    protected $fillable = ['title','content','title_address','content_address'];
}
