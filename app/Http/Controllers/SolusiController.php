<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Solusi;

use App\Berita;

use Auth;

use App\ViewUser;

use App\DetailSolusiLike;

class SolusiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_berita)
    {
        $users = ViewUser::all();
        $data = Berita::where('id_berita','=',$id_berita)->get();
        return view('mahasiswa.solusi',compact('data','users'));
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


    public function pilih($id){
        $data = Solusi::where('id_solusi','=',$id);
        $data->update(['status' => 'Solusi']);
        return back();
    }

    public function store(Request $request, $id_berita)
    {
        $data = new Solusi;
        $data->id_berita = $id_berita;
        $data->id_user = Auth::user()->id;
        $data->solusi = $request->solusi;
        $data->save();
        return back();
    }

    public function tambahLike($id_solusi){
        $data = DetailSolusiLike::where('id_solusi','=',$id_solusi)->where('id_user','=',Auth::user()->id)->get();
        if (!isset($data[0])) {
            $d = new DetailSolusiLike;
            $d->id_solusi = $id_solusi;
            $d->id_user = Auth::user()->id;
            $d->save();
        }else{
            $d = DetailSolusiLike::where('id_detail_solusi_like','=',$data[0]->id_detail_solusi_like)->delete();
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
            $data = Solusi::where('id_user','=',Auth::user()->id)->get();
        }
        return view('mahasiswa.solusi3',compact('data','users'));
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
