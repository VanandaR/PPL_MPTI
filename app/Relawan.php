<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relawan extends Model
{
    protected $table = "relawan";
    public $timestamps = false;

    function user(){
    	return $this->belongsTo('App\User','id_user','id');
    }

    function solusi(){
    	return $this->belongsTo('App\Solusi','id_solusi','id_solusi');
    }
}
