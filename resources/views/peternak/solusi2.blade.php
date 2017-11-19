@extends('layouts.head')
@section('body')
<!-- Navigation-->

<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{url('/')}}">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Solusi</li>
    </ol>
    <!-- Icon Cards-->
    @foreach($data as $row)
    <div class="row">
      <div class="col-md-12">
        <i class="fa fa-newspaper-o"></i>Tindak Lanjut
      </div>
      <hr class="mt-4">
      <div class="col-md-12">
        <div class="card">
          <div class="card-footer small text-muted">Posted {{$row->tanggal}}

          </div>
          <hr class="my-2">
          <div class="card-body">
            <h6 class="pull-right"><a href="#" style="font-size: 10px;">{{$row->status}}</a></h6>
            <h6 class="card-title mb-1"><a href="#">{{$row->user->name}}</a></h6>
            <p class="card-text small">{{$row->berita}}
            </p>
          </div>
          @if($row->status != 'Tersolusikan')
          @if($row->id_user != Auth::user()->id)
          <div class="col-md-12">
            <form action="{{url(Auth::user()->status.'/Solusi/'.$row->id_berita.'/Tambah')}}" method="post" accept-charset="utf-8">
              {{csrf_field()}}
              <textarea name="solusi" class="form-control" rows="4"></textarea>
              <button type="submit" class="btn btn-success">Beri Solusi</button>
            </form>
          </div>
          @endif
          @endif
        </div>
      </div>
    </div>

    @foreach($row->solusi as $r)
    <br>
    <div class="row">
      <div class="col-md-12">
        <div class="card" style="">
          <div class="card-body">
            <h6 class="pull-right"><a href="#" style="font-size: 10px;">{{$r->status}}</a></h6>
            <h6 class="card-title mb-1"><a href="#">{{$r->user->name}}</a></h6>
            <p class="card-text small">{{$r->solusi}}
            </p>
          </div>
          <hr class="my-2">
          <div class="card-footer small text-muted">Posted {{$r->tanggal}}
            @if($row->status != 'Tersolusikan')
            <a href="{{url(Auth::user()->status.'/Solusi/Like/')}}/{{$r->id_solusi}}" class="btn btn-primary pull-right">{{count($r->like)}}<i class="fa fa-fw fa-thumbs-up"></i>Like</a>
            @if(Auth::user()->id == $row->id_user)
            <a href="{{url(Auth::user()->status.'/Solusi/Pilih')}}/{{$r->id_solusi}}" class="btn btn-warning pull-right"><i class="fa fa-fw fa-check"></i>Jadikan Solusi</a>
            @endif
            @else 
            @if($r->status == 'Solusi')
            <a href="{{url(Auth::user()->status.'/Relawan/'.$r->id_solusi.'/Tambah')}}" class="btn btn-success pull-right"><i class="fa fa-fw fa-check"></i>Jadilah Relawan</a>
            @endif
            @endif
          </div>
        </div>
      </div>
    </div>
    @endforeach
    @endforeach
  </div>
  <!-- /Card Columns-->
</div>
<!-- Example DataTables Card-->
<!-- /.container-fluid-->
<!-- /.content-wrapper-->
<footer class="sticky-footer">
  <div class="container">
    <div class="text-center">
      <small>Copyright © Your Website 2017</small>
    </div>
  </div>
</footer>
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fa fa-angle-up"></i>
</a>
@endsection
