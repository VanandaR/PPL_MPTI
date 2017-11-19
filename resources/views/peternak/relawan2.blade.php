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
        <i class="fa fa-newspaper-o"></i>Berita
      </div>
      <hr class="mt-4">
      <div class="col-md-12">
        <div class="card">
          <div class="card-footer small text-muted">Posted {{$row->berita->tanggal}}
          </div>
          <hr class="my-2">
          <div class="card-body">
            <h6 class="pull-right"><a href="#" style="font-size: 10px;">{{$row->berita->status}}</a></h6>
            <h6 class="card-title mb-1"><a href="#">{{$row->berita->user->name}}</a></h6>
            <p class="card-text small">{{$row->berita->berita}}
            </p>
          </div>
        </div>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-md-12">
        <i class="fa fa-newspaper-o"></i>Solusi
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
            <p class="card-text small">{{$row->solusi}}
            </p>
            <div class="col-md-12">
              <a href="{{url(Auth::user()->status.'/Relawan/Join/'.$row->id_solusi)}}" class="btn btn-primary col-md-12">Join</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <br>
    <div class="row">
      <div class="col-md-12">
        <i class="fa fa-newspaper-o"></i>Relawan
      </div>
      @foreach($row->relawan as $r)
      <div class="col-md-4">
        <div class="card" style="">
          <div class="card-body">
            <h6 class="card-title mb-1"><a href="#">{{$r->user->name}}</a></h6>
            <h6 class="pull-left"><a href="#" style="font-size: 10px;">Tanggal Join : {{$r->tanggal}}</a></h6>
          </p>
        </div>
        <hr class="my-2">
      </div>
    </div>
    @endforeach
  </div>
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
