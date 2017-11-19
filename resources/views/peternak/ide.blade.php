@extends('layouts.navbar2')
@section('middle')
<!-- Middle Column -->
<div class="w3-col m7">
  @if(Auth::user()->status == 'Mahasiswa')
  
  <div class="w3-row-padding">
    <div class="w3-col m12">
      <div class="w3-card w3-round w3-white">
        <div class="w3-container w3-padding">
          <form action="{{url(Auth::user()->status.'/Ide/Tambah')}}" method="post"  enctype="multipart/form-data">
            {{csrf_field()}}
            <h6 class="w3-opacity">Tambah Ide</h6>
            <input type="radio" name="kategori" value="Pendidikan" placeholder="Pendidikan" required>Pendidikan 
            <input type="radio" name="kategori" value="Pariwisata" placeholder="Pariwisata" required>Pariwisata
            <input type="radio" name="kategori" value="Sosial" placeholder="Sosial" required>Sosial
            <br>
            <label for="judul"  style="width: 100px;">Judul : </label>
            <input type="text" name="judul" id="judul" class="w3-rest w3-border" required>
            <br>
            <label for="ide"  style="width: 100px;">Ide : </label>
            <br>
            <textarea  name="ide" contenteditable="true" class="w3-border w3-padding w3-col" required></textarea>
            <hr class="w3-clear">
            <label for="file"  style="width: 100px;">Gambar: </label>
            <input type="file" name="file" id="file" class="w3-rest w3-border" accept=".jpg">
            <hr class="w3-clear">
            <button type="submit" class="w3-button w3-theme w3-col"><i class="fa fa-pencil"></i>Terbitkan</button> 
          </form>
        </div>
      </div>
    </div>
  </div>
  @endif
@if(Auth::user()->status == 'Komunitas')

  <br>
  <div class="w3-row">
    <div class="w3-container">
      <a href="{{url(Auth::user()->status.'/home')}}" class="w3-card w3-button w3-quarter w3-blue">Semua</a>
      <a href="{{url(Auth::user()->status.'/home?kategori=Pendidikan')}}" class="w3-card w3-button w3-quarter w3-purple">Pendidikan</a>
      <a href="{{url(Auth::user()->status.'/home?kategori=Sosial')}}" class="w3 card w3-button w3-quarter w3-yellow">Sosial</a>
      <a href="{{url(Auth::user()->status.'/home?kategori=Pariwisata')}}" class="w3-card w3-button w3-quarter w3-red">Pariwisata</a>
      <a href="#" id="btn_komunitas" onclick="go('Komunitas');" class="w3-card w3-button w3-half w3-light-blue w3-hover-blue" title="My Account"><img src="" class="w3-circle" style="height:25px;width:25px" alt="Komunitas"></a>
      <a href="#" id="btn_nasional" onclick="go('Nasional');" class="w3-card w3-button w3-half  w3-light-blue w3-hover-blue" title="My Account"><img src="" class="w3-circle" style="height:25px;width:25px" alt="Nasional"></a>
    </div>
  </div>
  <br>
@endif
  @foreach($data as $row)
  <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
    <span class="w3-right w3-opacity">{{$row->kategori.'|'.$row->kategori}}</span>
    <h4>{{$row->judul}}</h4>
    <img src="{{url('img/ide/ide'.$row->id_ide)}}.jpg" alt="-" class="w3-col">
    <hr class="w3-clear">
    <br>
    <p>{{$row->ide}}</p>
  </div> 
  @endforeach
  <!-- End Middle Column -->
</div>
@if(Auth::user()->status == 'Komunitas')
<script src="{{url('js/external/jquery/jquery.js')}}"></script>
<script>
  $(document).ready(function(){
    @if(isset($_GET['kategori']))
    $('#btn_komunitas').attr('href','{{url(Auth::user()->status."/home")}}?region=Komunitas&kategori={{$_GET["kategori"]}}');
    $('#btn_nasional').attr('href','{{url(Auth::user()->status."/home")}}?region=Nasional&kategori={{$_GET["kategori"]}}');
    @else 
    $('#btn_komunitas').attr('href','{{url(Auth::user()->status."/home")}}?region=Komunitas');
    $('#btn_nasional').attr('href','{{url(Auth::user()->status."/home")}}?region=Nasional');
    @endif
  });
</script>
@endif
@endsection



