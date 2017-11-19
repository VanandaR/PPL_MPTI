@extends('layouts.navbar2')
@section('middle')
<!-- Middle Column -->
<div class="w3-col m7">
  @if(Auth::user()->status != 'Komunitas')
  @foreach($data as $row)
  <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
    <span class="w3-right w3-opacity">{{$row->berita->tanggal}}</span>
    <h4>Berita : {{$row->berita->user->kota->nama}}</h4>
    <hr class="w3-clear">
    <p>{{$row->berita->berita}}</p>
  
    <span class="w3-right w3-opacity">{{$row->tanggal}}</span>
    <h4>Solusi : {{$row->user->name}}</h4>
    <hr class="w3-clear">
    <p>{{$row->solusi}}</p>
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
    <span class="w3-right w3-opacity">{{$r->tanggal}}</span>
    <h4>Solusi : {{$r->user->name}}</h4>
    <hr class="w3-clear">
    <p>{{$r->solusi}}</p>
    @endforeach
  </div> 
  @endforeach
  @endif
  <!-- End Middle Column -->
</div>
@endsection



