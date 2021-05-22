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
                <form action="/admin/users" method="GET">
                    <div class="float-left mt-4 ml-4 input-group col-6">
                        <input type="text" name="cari" class="form-control" placeholder="Search..." value="{{ old('cari') }}" aria-describedby="button-addon2">
                        <div class="input-group-append">
                        <button class="btn btn-outline-secondary" value="CARI" type="submit" id="button-addon2">Search</button>
                        </div>
                    </div>
                </form>
                {{-- End of search box --}}
            </div>
            <div class="col-4 float-left">
                {{-- Select Filter --}}
                <form action="/admin/users" method="GET">
                    <div class="float-left mt-4 ml-4 input-group ">
                        <select class="col-3 custom-select float-left" name="filter" id="filter_status">
                            <option selected disabled>Show By</option>
                            <option value="">All</option>
                            <option value="user">User</option>
                            <option value="partner">Partner</option>
                            <option value="pending">All Pending Partner</option>
                            <option value="active">All Active User</option>
                        </select>
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Filter</button>
                        </div>
                    </div>
                </form>
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

                                <div class="form-group{{ $errors->has('name') ? 'has-error' : '' }}">
                                    <label for="nama" class="control-label mt-4">Nama</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="recipient-name1" value="{{ old('name') }}">
                                    @if ($errors->has('name'))
                                        <span class="help-block text-danger"> {{ $errors->first('name') }}</span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('no_hp') ? 'has-error' : '' }}">
                                    <label for="recipient-name" class="control-label mt-4">No HP/Telp</label>
                                    <input type="number" name="no_hp" class="form-control  @error('no_hp') is-invalid @enderror" value="{{ old('no_hp') }}" id="recipient-name1">
                                    @if ($errors->has('no_hp'))
                                        <span class="help-block text-danger"> {{ $errors->first('no_hp') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="control-label mt-4">Email</label>
                                    {{-- <input type="email" name="email" class="form-control"> --}}
                                    <div class="{{'form-group required'.$errors->first('email',' has-error')}}">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">
                                    @if ($errors->has('email'))
                                        <span class="help-block text-danger"> {{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                
                                <div class="form-group{{ $errors->has('password') ? 'has-error' : '' }}">
                                    <label for="recipient-name" class="control-label mt-2">Password</label>
                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="recipient-name1">
                                    @if ($errors->has('password'))
                                        <span class="help-block text-danger"> {{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                                 <div class="form-group{{ $errors->has('cpassword') ? 'has-error' : '' }}">
                                     <label for="recipient-name" class="control-label mt-2">Confirm Password</label>
                                     <input type="password" name="cpassword" class="form-control @error('cpassword') is-invalid @enderror" id="recipient-name1">
                                     @if ($errors->has('cpassword'))
                                        <span class="help-block text-danger"> {{ $errors->first('cpassword') }}</span>
                                    @endif
                                 </div>
                                 
                                <div class="form-group{{ $errors->has('role') ? 'has-error' : '' }}"> 
                                    <label for="recipient-name" class="control-label mt-2">Role</label>
                                    <select class="custom-select @error('role') is-invalid @enderror" name="role">
                                        <option selected disabled> </option>
                                        <option value="user">User</option>
                                        <option value="partner">Partner</option>
                                        <option value="admin">Admin</option>
                                    </select>
                                    @if ($errors->has('role'))
                                        <span class="help-block text-danger"> {{ $errors->first('role') }}</span>
                                    @endif
                                </div>
                                
                                
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
                        <th>Role</th>
                        <th>Status</th>
                        <th class="">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $i++ }}</td>    
                        <td>{{ $user->name}}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->no_hp }}</td>
                        <td>{{ $user->role }}</td>
                        <td>{{ $user_status[$user->status] }}</td>
                        <td style="color: white">
                            <a class="btn btn-secondary">Lihat</a>
                            <a class="btn btn-secondary" href="/admin/users/edit/{{ $user->id }}/">Ubah</a>
                            <a class="btn btn-danger popup-confirm-delete" href="/admin/users/deleteUser/{{ $user->id }}">Hapus</a>

                            @if ($user->status == 'suspend')
                                <a href="/admin/users/{{ $user->id }}/active" class="btn btn-primary popup-confirm-action">Enable</a>
                            @endif

                            @if ($user->status == 'pending')
                                <a href="/admin/users/{{ $user->id }}/active" class="btn btn-success popup-confirm-approve">Approve</a>
                                <a href="/admin/users/{{ $user->id }}/reject" class="btn btn-danger popup-confirm-reject">Reject</a>
                            @endif

                            @if ($user->status == 'active')
                                <a href="/admin/users/{{ $user->id }}/suspend" class="btn btn-warning popup-confirm-action">Suspend</a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                    
                    
                </tbody>
            </table>
            
        </div>
    </div>

    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
          {{ $users->links() }}          
        </ul>
      </nav>
    
      <p class="text-center">Total Data: <b>{{ $total_data }}</b></p>
      


@endsection
@section('script')
<script src="{{asset('back-assets/assets/extra-libs/DataTables/datatables.min.js')}}"></script>
<script>    
    $('.popup-confirm-approve').click(function(e) {
        e.preventDefault();
        var actionurl = $(this).attr('href');
        
        Swal.fire({
            title: 'Apa Anda yakin?',
            text: "Sistem akan melakukan proses approval dan mengirim informasi approval ke email user",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, saya yakin',
            cancelButtonText: 'Tidak',
        }).then((result) => {
            if (result.value === true) {
                window.location = actionurl;
            } 
        })
    });
    $('.popup-confirm-reject').click(function(e) {
        e.preventDefault();
        var actionurl = $(this).attr('href');
        
        Swal.fire({
            title: 'Apa Anda yakin?',
            text: "Sistem akan melakukan proses reject dan mengirim informasi reject ke email user",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, saya yakin',
            cancelButtonText: 'Tidak',
        }).then((result) => {
            if (result.value === true) {
                window.location = actionurl;
            } 
        })
    });
</script>
@endsection