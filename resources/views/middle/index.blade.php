@extends('layouts.middle-layouts')

@section('title')
    Dashboard
@endsection                 

@section('content')
    
<div class="row">
        <div class="col-md-3">
          <div class="card card-simple-1">
            <div class="card-body"><i class="la la-user"></i>
              <div class="card-content">
                <h5>Program Dibuat</h5>
                <p>{{$program}}</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card card-simple-1">
            <div class="card-body"><i class="la la-newspaper-o"></i>
              <div class="card-content">
                <h5>Program Dipublish</h5>
                <p>{{$programPublished}}</p>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-3">
          <div class="card card-simple-1">
            <div class="card-body"><i class="la la-newspaper-o"></i>
              <div class="card-content">
                <h5>Berdonasi</h5>
                <p>{{$donasi}}</p>
              </div>
            </div>
          </div>
        </div>
</div>

<div class="row">
    <div class="col-md-3">
        <div class="card card-simple-1">
          <div class="card-body"><i class="la la-calendar"></i>
            <div class="card-content">
              <h5>Program Pending</h5>
              <p>{{$programNotPublished}}</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card card-simple-1">
          <div class="card-body"><i class="la la-shopping-cart"></i>
            <div class="card-content">
              <h5>Belum Konfirmasi</h5>
              <p>{{$konfir}}</p>
            </div>
          </div>
        </div>
      </div>
</div>

@endsection