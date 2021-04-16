@extends('layouts.back-layouts')
@section('title')
    Dashboard
@endsection

@section('style')
<link rel="stylesheet" href="{{asset('back-assets/dist/css/style.min.css')}}">
    <style>
        td{
            width: 390px !important;
        }
    </style>
@endsection

@section('content')

    <div class="material-card card">
        <div class="row">
            <div class="col-4">
                {{-- <h2 class="float-left mt-4 ml-4">Daftar User</h2> --}}
                <div class="input-group">
                    <input type="text" class="form-control col-md-4 float-left mt-4 ml-4" placeholder="Search User">
                    <div class="input-group-append">
                      <button class="btn btn-secondary mt-4" type="button">Search</button>
                    </div>
                  </div>

                 
            </div>

            <div class="col-2 mt-4">
                {{-- <h2 class="float-left mt-4 ml-4">Daftar User</h2> --}}
                <select class="form-control">
                    <option selected disabled>Show By</option>
                    <option value="#">User</option>
                    <option value="#">Parter</option>
                    <option value="#">All Pending User</option>
                    <option value="#">All Active User</option>
                </select>
            </div>
            <div class="col-6">
                <button type="button" class="float-right mt-4 mr-4 btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Tambah User</button>
       
                {{-- MODALS --}}

                <div class="modal fade show" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-modal="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="exampleModalLabel1">Tambah User Baru</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body">
                                <form action="/admin/categories/create" method="POST">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Username</label>
                                        <input type="text" name="category_name" class="form-control" id="recipient-name1">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">No Hp/Telp</label>
                                        <input type="text" name="category_name" class="form-control" id="recipient-name1" aria-describedby="telpHelp">
                                        {{-- <small id="telpHelp" class="form-text text-muted">kami tidak akan membagikan nomor telepon mu ke publik</small> --}}
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                        {{-- <small id="emailHelp" class="form-text text-muted">Email mu akan aman, kami tidak akan membagikan email mu ke publik</small> --}}
                                    </div>
                                    

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="password" class="form-control" id="exampleInputPassword1">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Confirm Password</label>
                                        <input type="password" class="form-control" id="exampleInputPassword1">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Role</label>
                                        <select class="form-control" id="exampleFormControlSelect1">
                                          <option selected disabled>Pilih Role Anda</option>
                                          <option>Admin</option>
                                          <option>Partner</option>
                                          <option>User</option>
                                        </select>
                                    </div>
                                    
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary">Buat</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>

                {{-- END MODALS --}}

            </div>
        </div>

        <div class="card-body">
             <table class="table">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Email</th>
                        <th>No HP/Telp</th>
                        <th >Status</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>nama1</td>
                        <td>mail@gmail.com</td>
                        <td>0812133123</td>
                        <td>Active</td>
                        <td>
                            <a class="btn btn-secondary" href="#" style="color: white">Lihat</a>
                            <a class="btn btn-secondary" href="#" style="color: white">Ubah</a>
                            <a class="btn btn-danger" href="#">Hapus</a>
                            <a class="btn btn-primary" href="#">Enabled</a>

                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>


@endsection
@section('script')
<script src="{{asset('back-assets/assets/extra-libs/DataTables/datatables.min.js')}}"></script>

@endsection