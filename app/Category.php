<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $fillable = ['name','slug'];
	
    protected $table = 'category';

    public function posts(){
    	return $this->hasMany('App\Posts');
    }
	public function channels(){
    	return $this->hasMany('App\Channel');
    }

    public function getRouteKeyName()
	{
	    return 'slug';
	}
}
