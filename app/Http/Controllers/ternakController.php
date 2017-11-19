<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\ternak;
use App\user;
use Validator;

use Auth;

class ternakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $users = ViewUser::all();
        // if (Auth::user()->status == 'Komunitas') {
        //     $data = Ide::join('users','ide.id_user','=','users.id')->where('users.id_komunitas','=',Auth::user()->id)->get();
        // }else{
        //     $data = Ide::where('id_user','=',Auth::user()->id)->get();
        // }
      $data = ternak::all();
      return view('peternak.tambahternak',compact('data'));
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     $validator = Validator::make(request()->all(), [
      'harga'  => 'required',
            'bobot'  => 'required',
            'foto'=>'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'umur'=>'required'
      ]);
     if ($validator->fails()) {
      return back()
      ->withErrors($validator->errors());
    }
    else{
      $data = new ternak;

      if( $request->hasFile('foto')) {
        $photoName = time().'.'.$request->foto->getClientOriginalExtension();
        $request->foto->move(public_path('/img/ternak'), $photoName);
        $data->foto=$photoName;
      }
      $data->id_user = Auth::user()->id;

      $data->jenisHewan = $request->jenisHewan;
      $data->harga=$request->harga;
      $data->bobot=$request->bobot;
      $data->umur=$request->umur;
      $data->lokasi=$request->lokasi;
      $data->deskripsi=$request->deskripsi;
      $data->status='belum terjual';
        // $data->save();
      $dat = ternak::insertGetId($data->toArray());
        // echo $dat;
      return redirect('peternak/home');
    }
  }
  public function miliksemua(){
    $users=user::all();
    $data = ternak::join('users','ternak.id_user','=','users.id')->get();

    return view('peternak.home',compact('data','users')); 
  }
  public function lihatsemua(){

    $data = ternak::all();

    return view('investor.home',compact('data')); 
  }
  public function sapiperah(){

    $data = ternak::where('jenisHewan','=','sapi perah dewasa')->get();

    return view('investor.home',compact('data')); 
  }
  public function sapibali(){

    $data = ternak::where('jenisHewan','=','sapi bali dewasa')->get();

    return view('investor.home',compact('data')); 
  }
  public function sapisimental(){

    $data = ternak::where('jenisHewan','=','sapi simental dewasa')->get();

    return view('investor.home',compact('data')); 
  }
  public function miliksendiri(){
    $users=user::all();
    $data = ternak::join('users','ternak.id_user','=','users.id')->where('users.id','=',Auth::user()->id)->get();

    return view('peternak.home',compact('data','users')); 
  }
  public function hitung3bulan(){
    $users=user::all();

  }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
  }
