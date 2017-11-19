<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ide extends Model
{
    protected $table = "ide";
    public $timestamps = false;

    function user(){
    	return $this->belongsTo('App\User','id_user','id');
    }
}
