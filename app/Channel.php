<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Channel extends Model
{
    use SoftDeletes;

	protected $fillable = ['judul','url_channel','gambar','slug','users_id'];

    public function category(){
    	return $this->belongsTo('App\Category');
    }

    public function tags(){
    	return $this->belongsToMany('App\Tags');
    }

    public function users(){
    	return $this->belongsTo('App\User');
    }
}
