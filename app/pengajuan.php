<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class pengajuan extends Model
{
    protected $table = "pengajuan";
    public $timestamps = true;
    protected $primaryKey="id_pengajuan";

    function user(){
    	return $this->belongsTo('App\User','id_user');
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
