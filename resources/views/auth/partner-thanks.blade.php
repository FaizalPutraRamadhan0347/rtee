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
                        <h5 class="font-medium mb-3">Terima Kasih</h5>
                        <p>Request Pendaftaran Partner di Sedekah itu Mudah telah kami terima.</p>

                        <p>Admin kami akan melakukan verifikasi data terlebih dahulu, sebelum akun partner Anda aktif.</p>
                            
                        <p>Proses verifikasi maksimal 2 x 24 jam. Silahkan tunggu email konfirmasi kembali dari kami.</p>
                        
                        <p>Jika anda membutukan bantuan, Anda bisa menghubungi staff Admin kami melalui email info@sedekahitumudah.com atau nomor telp / whatsapp berikut 081321425825</p>
                        
                        <p>Terima Kasih</p>

                        <a href="/" class="btn btn-primary">Kembali ke halaman utama</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>
    $('[data-toggle="tooltip "]').tooltip();
    $(".preloader ").fadeOut();
    </script>


@endsection
