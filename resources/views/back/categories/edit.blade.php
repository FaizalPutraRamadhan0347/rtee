@extends('layouts.back-layouts')
@section('title')
    Kelola Kategori - Ubah
@endsection

@section('style')
<link rel="stylesheet" href="{{asset('back-assets/dist/css/style.min.css')}}">
@endsection

@section('content')
<div class="row">
    <div class="col-lg-4 col-md-6 col-12">
        <div class="card">
            <div class="card-body">
            <form action="/admin/categories/edit/{{ $category->id }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="category_name" class="control-label">Nama Kategori</label>
                    <input type="text" name="category_name" class="form-control" id="category_name" value="{{ $category->category_name }}">
                </div>
                <div class="form-group">
                    <label for="ops_percentage" class="control-label">Potongan Operasional</label>
                    <div class="input-group mb-3">
                        <input type="text" name="ops_percentage" class="form-control" id="ops_percentage" value="{{ $category->ops_percentage }}">
                        <div class="input-group-append">
                            <span class="input-group-text">%</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Ubah</button>
                    <a href="/admin/categories" class="btn btn-danger">Batal</a>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection
