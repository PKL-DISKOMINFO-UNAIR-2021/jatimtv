<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    protected $fillable = ['name','slug'];

    public function posts(){
    	return $this->belongsToMany('App\Posts');
    }

    public function channels(){
    	return $this->belongsToMany('App\Channels');
    }
    public function explores(){
    	return $this->belongsToMany('App\explores');
    }
}
