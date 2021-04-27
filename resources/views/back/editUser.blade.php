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

<div class="modal-body">
    <h1>Edit User</h1>
    <form action="/admin/users/{{ $user->id}}/update" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="nama" class="control-label mt-4">Nama</label>
            <input type="text" name="name" class="form-control" id="recipient-name1" value="{{ $user->name }}">

            <label for="recipient-name" class="control-label mt-4">No HP/Telp</label>
            <input type="number" name="no_hp" class="form-control" id="recipient-name1" value="{{ $user->no_hp }}">

            <label for="recipient-name" class="control-label mt-4">Email</label>
            <input type="email" name="email" class="form-control"  value="{{ $user->email }}">
            


            <label for="recipient-name" class="control-label mt-4">Password</label>
            <input type="password" name="password" class="form-control" id="recipient-name1"  value="">

            {{-- <label for="recipient-name" class="control-label mt-2">Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-control" id="recipient-name1"  value="{{ $user->password }}"> --}}

            <label for="recipient-name" class="control-label mt-2">Role</label>
            <select class="custom-select" name="role"  value="{{ $user->role }}">
                <option selected disabled> </option>
                <option value="user" @if($user->role == 'user') selected @endif>User</option>
                <option value="partner" @if($user->role == 'partner') selected @endif>Partner</option>
                <option value="admin" @if($user->role == 'admin') selected @endif>Admin</option>
            </select>
        </div>  
</div>
<div class="modal-footer">
    {{-- <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button> --}}
    <a href="/admin/users" class="btn btn-default">Tutup</a>
    <button type="submit" class="btn btn-primary">Update</button>
</div>
</form>
</div>
@endsection