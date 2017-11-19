<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solusi extends Model
{
    protected $table = "solusi";
    public $timestamps = false;

    function user(){
    	return $this->belongsTo('App\User','id_user','id');
    }

    function like(){
    	return $this->hasMany('App\DetailSolusiLike','id_solusi','id_solusi');
    }

    function relawan(){
    	return $this->hasMany('App\Relawan','id_solusi','id_solusi');
    }

    function berita(){
    	return $this->belongsTo('App\Berita','id_berita','id_berita');
    }

}
