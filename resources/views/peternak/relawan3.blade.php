@extends('layouts.navbar2')
@section('middle')
<!-- Middle Column -->
<div class="w3-col m7">
  @if(Auth::user()->status != 'Komunitas')
  @foreach($data as $row)
  <div class="w3-container w3-card w3-white w3-round w3-margin"><br>

    <span class="w3-right w3-opacity">{{$row->solusi->berita->tanggal}}</span>
    <h4>Berita : {{$row->solusi->berita->user->kota->nama}}</h4>
    <hr class="w3-clear">
    <p>{{$row->solusi->berita->berita}}</p>
  
    <span class="w3-right w3-opacity">{{$row->solusi->tanggal}}</span>
    <h4>Solusi : {{$row->solusi->user->name}}</h4>
    <hr class="w3-clear">
    <p>{{$row->solusi->solusi}}</p>
  </div>
  @endforeach
  @else 
  @foreach($data as $row)
  <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
    <span class="w3-right w3-opacity">{{$row->tanggal}}</span>
    <h4>Berita : {{$row->user->kota->nama}}</h4>
    <hr class="w3-clear">
    <p>{{$row->berita}}</p>
    @foreach($row->solusi as $r)
    @if($r->status = 'Solusi')
    <span class="w3-right w3-opacity">{{$r->tanggal}}</span>
    <h4>Solusi : {{$r->user->name}}</h4>
    <hr class="w3-clear">
    <p>{{$r->solusi}}</p>
    <hr>
    @foreach($r->relawan as $re)
    <p class="w3-third">{{$re->user->name}}</p>
    @endforeach
    @endif
    @endforeach
  </div>
  @endforeach
  @endif
  <!-- End Middle Column -->
</div>
@endsection



