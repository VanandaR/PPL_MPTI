<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\pengajuan;

use App\ternak;

use Auth;

use App\user;

use App\DetailSolusiLike;

class pengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_ternak)
    {
        $users = user::all();
        $data = ternak::where('id_ternak','=',$id_ternak)->get();
        $hitung3bulan=ternak::select('harga')->where('id_ternak','=',$id_ternak)->get();
        $datapengajuan = pengajuan::all();

  
        return view('investor.pengajuan',compact('data','users', 'datapengajuan','hitung3bulan'));
        
    }
     public function store(Request $request, $id_ternak)
    {
        $data = new pengajuan;
       $dataternak= ternak::where('id_ternak',$id_ternak)->first();
        

        $data->id_ternak = $id_ternak;
        $data->id_investor = Auth::user()->id;
        $data->jangkawaktu=$request->jangkawaktu;
        if ($data->jangkawaktu=='3bulan') {
          $data->perawatan='400000';
          $data->pakan='3000000';
          $data->asuransi='500000';

        }
        else if ($data->jangkawaktu=='6bulan') {
        $data->perawatan='800000';
          $data->pakan='6000000';
          $data->asuransi='1000000';
        }
        $data->total=$data->pakan+ $data->perawatan+$data->asuransi+$dataternak->harga;

        $data->status='Menunggu Persetujuan';
        $data->save();
        return redirect('investor/lihatpengajuan');
    }

    public function showinvestor()
    {
      
        $users = user::all();
       
        
            $data = pengajuan::select('users.*','pengajuan.*','ternak.*','pengajuan.status as status_pengajuan')
            ->join('users','pengajuan.id_investor','=','users.id')->join('ternak','pengajuan.id_ternak','=','ternak.id_ternak')->where('pengajuan.id_investor','=',Auth::user()->id)->where('pengajuan.status','=','Menunggu Persetujuan')->get();

            $ternaknya=ternak::join('pengajuan','pengajuan.id_ternak','=','ternak.id_ternak')->where('pengajuan.id_investor','=',Auth::user()->id)->get();
        
        return view('investor.liatpengajuan',compact('data','users','ternaknya'));
    }
    public function showinvestornotif()
    {
      
        $users = user::all();
       
        
            $data = pengajuan::select('users.*','pengajuan.*','ternak.*','pengajuan.status as status_pengajuan')
            ->join('users','pengajuan.id_investor','=','users.id')->join('ternak','pengajuan.id_ternak','=','ternak.id_ternak')->where('pengajuan.id_investor','=',Auth::user()->id)->where('pengajuan.status','=','disetujui')->get();

            $ternaknya=ternak::join('pengajuan','pengajuan.id_ternak','=','ternak.id_ternak')->where('pengajuan.id_investor','=',Auth::user()->id)->get();
        
        return view('investor.notifikasi',compact('data','users','ternaknya'));
    }
 public function showpeternak()
    {
        $users = user::all();
            $data = pengajuan::select('users.*','pengajuan.*','ternak.*','pengajuan.status as status_pengajuan')
            ->join('users','pengajuan.id_investor','=','users.id')->join('ternak','pengajuan.id_ternak','=','ternak.id_ternak')->where('ternak.id_user','=',Auth::user()->id)->where('pengajuan.status','=','Menunggu Persetujuan')->get();

            $ternaknya=ternak::join('pengajuan','pengajuan.id_ternak','=','ternak.id_ternak')->where('pengajuan.id_investor','=',Auth::user()->id)->get();
        
        return view('peternak.liatpengajuan',compact('data','users','ternaknya'));
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
    public function ubahData($id_pengajuan){
         $ajukan = pengajuan::find($id_pengajuan);
            $ajukan->status = "disetujui";  
            $ajukan->save();
            return redirect('peternak/lihatpengajuan');
    }
     public function hapusData($id_pengajuan){
         $hapus = pengajuan::destroy($id_pengajuan);
          
            return redirect('investor/lihatpengajuan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
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
