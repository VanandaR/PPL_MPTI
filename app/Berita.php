<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $table = "berita";
    public $timestamps = false;

    function user(){
    	return $this->belongsTo('App\User','id_user','id');
    }

    function solusi(){
    	return $this->hasMany('App\Solusi','id_berita','id_berita');
    }
}
