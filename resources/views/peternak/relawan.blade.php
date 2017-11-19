@extends('layouts.navbar2')
@section('middle')
<!-- Middle Column -->
<div class="w3-col m7">



  @foreach($data as $row)
  <div class="w3-container w3-card w3-white w3-round w3-margin"><br>

    <span class="w3-right w3-opacity">{{$row->berita->tanggal}}</span>
    <h4>Berita : {{$row->berita->user->kota->nama}}</h4>
    <hr class="w3-clear">
    <p>{{$row->berita->berita}}</p>
  </div> 

  <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
    <span class="w3-right w3-opacity">{{$row->tanggal}}</span>
    <h4>Solusi : {{$row->user->name}}</h4>
    <hr class="w3-clear">
    <p>{{$row->solusi}}</p>
    <div class="w3-col">
      <a href="{{url(Auth::user()->status.'/Relawan/Join/'.$row->id_solusi)}}" class="w3-button w3-theme-d1 w3-margin-bottom w3-col">Join</a>
    </div>
  </div> 

  @foreach($row->relawan as $r)
  <div style="width: 350px; margin-left: 5px;" class="w3-container w3-card w3-third w3-white w3-round w3-margin"><br>
    <h4>{{$r->user->name}}</h4>
    <hr class="w3-clear">
    <p>Tanggal Join : {{$r->tanggal}}</p>
  </div> 
  @endforeach

  @endforeach
  <!-- End Middle Column -->
</div>
@endsection



