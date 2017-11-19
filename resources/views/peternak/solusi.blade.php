@extends('layouts.navbar2')
@section('middle')
<!-- Middle Column -->
<div class="w3-col m7">
  @foreach($data as $row)
  <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
    <!-- <img src="/w3images/avatar6.png" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px"> -->
    <span class="w3-right w3-opacity">{{$row->tanggal}}</span>
    <h4>{{$row->user->kota->nama}}</h4>
    <hr class="w3-clear">
    <p>{{$row->berita}}</p>
    <!-- <img src="/w3images/nature.jpg" style="width:100%" class="w3-margin-bottom"> -->
    <!-- <button type="button" class="w3-button w3-theme-d1 w3-margin-bottom"><i class="fa fa-thumbs-up"></i>  Like</button>  -->
    <!-- <a href="{{url(Auth::user()->status.'/Solusi/Tambah/')}}/{{$row->id_berita}}" class="w3-button w3-theme-d1 w3-margin-bottom pull-right">Beri Solusi</a> -->
    <!-- <button type="button" class="w3-button w3-theme-d2 w3-margin-bottom"><i class="fa fa-comment"></i>  Comment</button>  -->
    @if($row->status != 'Tersolusikan')
    @if($row->id_user != Auth::user()->id)
    <div class="w3-row-padding">
      <div class="w3-col m12">
        <div class="w3-card w3-round w3-white">
          <div class="w3-container w3-padding">
            <form action="{{url(Auth::user()->status.'/Solusi/'.$row->id_berita.'/Tambah')}}" method="post" accept-charset="utf-8">
              {{csrf_field()}}
              <textarea  name="solusi" contenteditable="true" class="w3-border w3-padding w3-col"></textarea>
              <button type="submit" class="w3-button w3-theme"><i class="fa fa-pencil"></i>Ajukan</button> 
            </form>
          </div>
        </div>
      </div>
    </div>
    @endif
    @endif
  </div> 


  @foreach($row->solusi as $r)
  <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
    <span class="w3-right w3-opacity">{{$r->tanggal}}</span>
    <h4>{{$r->user->name}}</h4>
    <hr class="w3-clear">
    <p>{{$r->solusi}}</p>
    @if($row->status != 'Tersolusikan')
    <a href="{{url(Auth::user()->status.'/Solusi/Like/')}}/{{$r->id_solusi}}" class="w3-button w3-theme-d1 w3-margin-bottom pull-right">{{count($r->like)}}<i class="fa fa-fw fa-thumbs-up"></i>Like</a>
    @if(Auth::user()->id == $row->id_user)
    <a href="{{url(Auth::user()->status.'/Solusi/Pilih')}}/{{$r->id_solusi}}" class="w3-button w3-theme-d1 w3-margin-bottom pull-right"><i class="fa fa-fw fa-check"></i>Jadikan Solusi</a>
    @endif
    @else 
    @if($r->status == 'Solusi')
    <a href="{{url(Auth::user()->status.'/Relawan/'.$r->id_solusi.'/Tambah')}}" class="w3-button w3-theme-d1 w3-margin-bottom pull-right"><i class="fa fa-fw fa-check"></i>Jadilah Relawan</a>
    @endif
    @endif
  </div>
  @endforeach

  @endforeach
  <!-- End Middle Column -->
</div>
@endsection



