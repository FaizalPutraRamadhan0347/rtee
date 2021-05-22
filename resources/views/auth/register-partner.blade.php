@extends('layouts.front-layouts')

@section('title')
    Sedekah itu Mudah - Pendaftaran Lembaga / Partner
@endsection

@section('style')
<link href="back-assets/dist/css/style.min.css" rel="stylesheet">   
<style>
        .head-title h5{
            font-weight: bold;
            font-size: 16px; 
        }
        .main-wrapper{
            margin-top: -150px;
        }
        .nav-bar{
            display: none;
        }
        
        .auth-box{
            border-radius: 10px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.30) !important;
        }
        
        </style>    
@endsection

@section('content')

<div class="main-wrapper">
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" >
            <div class="auth-box">
                <div>
                    <div class="head-title">
                        <h5 class="font-medium mb-3">Pendaftaran Lembaga / Partner</h5>
                    </div>
                    <form action="{{route('register-partner')}}" method="post">
                        @csrf                    
                    <div class="row">
                        <div class="col-12">
                            <div class="form-horizontal mt-3">
                                
                                <p><b>Info Akun</b></p>

                                <div class="form-group row ">
                                    <div class="col-12 ">
                                        <input class="form-control-lg form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{old('name')}}" name="name" type="text" required autofocus placeholder="Nama Lengkap">
                                        @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>Mohon Masukan Nama yang Valid</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <div class="col-12">
                                        <input class="form-control-lg form-control {{ $errors->has('no_hp') ? ' is-invalid' : '' }}" name="no_hp" value="{{ old('no_hp') }}" type="number" required placeholder="Nomor Telp / Whatsapp">
                                        @if ($errors->has('no_hp'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>Mohon Masukan Nomor Handphone yang Valid</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12 ">
                                        <input class="form-control-lg form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" type="email" required placeholder="Alamat Email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12 ">
                                        <input class="form-control-lg form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" type="password" required autocomplete="new-password" placeholder="Password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12 ">
                                        <input class="form-control-lg form-control" type="password" name="password_confirmation" required=" " placeholder="Konfirmasi Password">
                                    </div>
                                </div>
                                
                                <p><b>Info Lembaga / Partner</b></p>

                                <div class="form-group row ">
                                    <div class="col-12 ">
                                        <input class="form-control-lg form-control {{ $errors->has('partner_name') ? ' is-invalid' : '' }}" value="{{old('partner_name')}}" name="partner_name" type="text" required placeholder="Nama Lembaga">
                                        @if ($errors->has('partner_name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>Mohon Masukan Nama yang Valid</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <div class="col-12 ">
                                        <textarea class="form-control-lg form-control {{ $errors->has('partner_address') ? ' is-invalid' : '' }}" name="partner_address" required placeholder="Alamat Lengkap">{{old('partner_address')}}</textarea>
                                        @if ($errors->has('partner_address'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>Mohon Masukan Alamat yang Valid</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <div class="col-12">
                                        <input class="form-control-lg form-control {{ $errors->has('partner_phone') ? ' is-invalid' : '' }}" name="partner_phone" value="{{ old('partner_phone') }}" type="number" required placeholder="Nomor Telp">
                                        @if ($errors->has('partner_phone'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>Mohon Masukan Nomor Telp yang Valid</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <div class="col-12 ">
                                        <textarea class="form-control-lg form-control {{ $errors->has('partner_info') ? ' is-invalid' : '' }}" name="partner_info" required placeholder="Informasi tentang Lembaga">{{old('partner_info')}}</textarea>
                                        @if ($errors->has('partner_info'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>Mohon Masukan Informasi yang Valid</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group text-center ">
                                    <div class="col-xs-12 pb-3 ">
                                        <button class="btn btn-block btn-lg btn-info " type="submit ">Daftar</button>
                                    </div>
                                </div>

                                <div class="form-group mb-0 mt-2 ">
                                    <div class="col-sm-12 text-center ">
                                        Sudah Punya Akun? <a href="/login" class="text-info ml-1 "><b>LogIn</b></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </form>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>
    $('[data-toggle="tooltip "]').tooltip();
    $(".preloader ").fadeOut();
    </script>


@endsection
