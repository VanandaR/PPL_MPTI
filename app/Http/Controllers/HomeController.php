<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\ternak;
use App\user;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function homepeternak(){

    
        $users = user::all();
        
            $data = ternak::join('users','ternak.id_user','=','users.id')->where('users.id','=',Auth::user()->id)->get();
        
        return view('peternak.home',compact('data','users'));
    }
      public function homeinvestor(){

    
        $users = user::all();
        
            $data = ternak::join('users','ternak.id_user','=','users.id')->get();
        
        return view('investor.home',compact('data','users'));
    }
    

    public function melengkapi(){
        return view('mahasiswa.melengkapi');
    }


}
