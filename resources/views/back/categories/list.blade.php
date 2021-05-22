@extends('layouts.back-layouts')
@section('title')
    Kelola Kategori - List
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
                <form action="/admin/categories" method="GET">
                    <div class="float-left mt-4 ml-4 input-group col-6">
                        <input type="text" name="q" class="form-control" placeholder="Search..." value="{{ old('q') }}" aria-describedby="button-addon2">
                        <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
                        </div>
                    </div>
                </form>
                {{-- End of search box --}}
            </div>
            <div class="col-6">
                <button type="button" class="float-right mt-4 mr-4 btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Tambah Kategori</button>

    {{-- MODALS --}}

    <div class="modal fade show" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-modal="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel1">Tambah Kategori Baru</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                        <form action="/admin/categories/create" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="category_name" class="control-label">Nama Kategori</label>
                                <input type="text" name="category_name" class="form-control" id="category_name">
                            </div>
                            <div class="form-group">
                                <label for="ops_percentage" class="control-label">Potongan Operasional</label>
                                <input type="text" name="ops_percentage" class="form-control" id="ops_percentage">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
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
                        <th>Nama Kategori</th>
                        <th>Potongan Operasional</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$category->category_name}}</td>
                        <td>@if ($category->ops_percentage === null)
                            {{ config('app.global_setting')['persen'] }} %
                        @else
                            {{$category->ops_percentage}} %
                        @endif</td>
                        <td>
                            <a class="btn btn-secondary" href="/admin/categories/edit/{{$category->id}}">Ubah</a>
                            <a class="btn btn-danger popup-confirm-delete" href="/admin/categories/delete/{{$category->id}}">Hapus</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
    </div>

    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
          {{ $categories->links() }}          
        </ul>
      </nav>
    
      <p class="text-center">Total Data: <b>{{ $total_data }}</b></p>

@endsection
@section('script')
<script src="{{asset('back-assets/assets/extra-libs/DataTables/datatables.min.js')}}"></script>
@endsection
