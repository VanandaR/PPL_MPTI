<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Ide;
use App\ViewUser;


use Auth;

class IdeController extends Controller
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
        return view('peternak.tambahternak');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        if ((($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/pjpeg")) && ($_FILES["file"]["size"] < 20000000)){
          if ($_FILES["file"]["error"] > 0){
            return back();
          }
        }else{
            return back();
        }
        $data = new Ide;
        $data->id_user = Auth::user()->id;
        $data->ide = $request->ide;
        $data->kategori = $request->kategori;
        $data->judul = $request->judul;
        // $data->save();
        $dat = Ide::insertGetId($data->toArray());
        // echo $dat;
        if ((($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/pjpeg")) && ($_FILES["file"]["size"] < 20000000)){
          if ($_FILES["file"]["error"] > 0){
            return back();
          }else{
              $imageName = 'ide'.$dat.'.' . pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION);
              move_uploaded_file($_FILES["file"]["tmp_name"],
                  $_SERVER['DOCUMENT_ROOT'].'/img/ide/' . $imageName);
          }
        }else{
            return back();
        }
        return back();
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
