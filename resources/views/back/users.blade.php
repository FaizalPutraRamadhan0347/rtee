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
            <div class="col-6">
                {{-- Search Box --}}
                <form action="/admin/users/search" method="GET">
                    <div class="float-left mt-4 ml-4 input-group col-6">
                        <input type="text" name="cari" class="form-control" placeholder="Search..." value="{{ old('cari') }}" aria-describedby="button-addon2">
                        <div class="input-group-append">
                        <button class="btn btn-outline-secondary" value="CARI" type="submit" id="button-addon2">Search</button>
                        </div>
                    </div>
                </form>

                  {{-- <p>Cari Data Pegawai :</p>
<form action="/pegawai/cari" method="GET">
	<input type="text" name="cari" placeholder="Cari Pegawai .." value="{{ old('cari') }}">
	<input type="submit" >
</form> --}}
                {{-- End of search box --}}
            </div>
            <div class="col-4 float-left">
                {{-- Select Filter --}}
                <select class="col-3 custom-select float-left mt-4">
                    <option selected disabled>Show By</option>
                    <option value="1">User</option>
                    <option value="2">Partner</option>
                    <option value="3">All Pending Partner</option>
                    <option value="3">All Active User</option>
                </select>
                {{-- End of Select Filter --}}
            </div>
            <div class="col-2">
                <button type="button" class="float-right mt-4 mr-4 btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Tambah</button>
                


    {{-- MODALS --}}

    <div class="modal fade show" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-modal="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel1">Buat Pengguna Baru</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                        <form action="/admin/users/create" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="nama" class="control-label mt-4">Nama</label>
                                <input type="text" name="name" class="form-control" id="recipient-name1">

                                <label for="recipient-name" class="control-label mt-4">No HP/Telp</label>
                                <input type="number" name="no_hp" class="form-control" id="recipient-name1">

                                <label for="recipient-name" class="control-label mt-4">Email</label>
                                {{-- <input type="email" name="email" class="form-control"> --}}
                                
                                <div class="{{'form-group required'.$errors->first('email',' has-error')}}">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                <span class="invalid-feedback" role="alert">
                                        <strong><div class="text-danger">{{$errors->has('email') ? $errors->first('email') : ''}}</div></strong>
                                </span>

                                <label for="recipient-name" class="control-label mt-4">Password</label>
                                <input type="password" name="password" class="form-control" id="recipient-name1">

                                <label for="recipient-name" class="control-label mt-2">Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control" id="recipient-name1">

                                <label for="recipient-name" class="control-label mt-2">Role</label>
                                <select class="custom-select" name="role">
                                    <option selected disabled> </option>
                                    <option value="user">User</option>
                                    <option value="partner">Partner</option>
                                    <option value="admin">Admin</option>
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
                        <th>NO</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No HP/Telp</th>
                        <th>Status</th>
                        <th class="">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    {{-- @foreach ($categories as $category)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$category->category_name}}</td>
                        <td>
                            <a class="btn btn-danger" href="/admin/delete/{{$category->id}}">Hapus</a>
                        </td>
                    </tr>
                    @endforeach --}}

                    {{-- Td sementara --}}
                    
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $i++ }}</td>    
                        <td>{{ $user->name}}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->no_hp }}</td>
                        <td>{{ $user->status }}</td>
                        <td style="color: white">
                            <a class="btn btn-secondary">Lihat</a>
                            <a class="btn btn-secondary" href="/admin/users/edit/{{ $user->id }}/">Ubah</a>
                            <a class="btn btn-danger" href="deleteUser/{{ $user->id }}">Hapus</a>

                            {{-- Membuat Kondisi Button sesuai status --}}
                            <a class="btn btn-primary">Enable</a>
                        </td>
                    </tr>
                    @endforeach
                    
                    
                </tbody>
            </table>
            
        </div>
    </div>

    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
          {{-- <li class="page-item">
            <a class="page-link" href="#" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
            </a>
          </li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
            </a>
          </li> --}}
          {{ $users->links() }}
          
        </ul>
      </nav>
    


@endsection
@section('script')
<script src="{{asset('back-assets/assets/extra-libs/DataTables/datatables.min.js')}}"></script>

@endsection