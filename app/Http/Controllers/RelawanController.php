<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Relawan;

use App\ViewUser;

use App\Berita;

use App\Solusi;
use Auth;
class RelawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $users = ViewUser::all();

        $data = Solusi::where('id_solusi','=',$id)->get();
        // print_r($data);
        return view('mahasiswa.relawan',compact('data','users'));
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
    public function store(Request $request,$id)
    {
        // echo Auth::user()->id.$id;
        $d = Relawan::where('id_user','=',Auth::user()->id)->where('id_solusi','=',$id)->get();
        if (!isset($d[0])) {
            $data = new Relawan;
            $data->id_user = Auth::user()->id;
            $data->id_solusi = $id;
            $data->save();
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $users = ViewUser::all();
        if (Auth::user()->status == 'Komunitas') {
            $data = Berita::where('id_user','=',Auth::user()->id)->get();
        }else{
            $data = Relawan::where('id_user','=',Auth::user()->id)->get();
        }
        return view('mahasiswa.relawan3',compact('data','users'));
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
