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
            <div class="col-6"></div>
            <div class="col-6">
                <button type="button" class="float-right mt-4 mr-4 btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Tambah Kategori</button>


    {{-- MODALS --}}

    <div class="modal fade show" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-modal="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel1">buat Kategori Baru</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                        <form action="/admin/categories/create" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Nama Kategori</label>
                                <input type="text" name="category_name" class="form-control" id="recipient-name1">
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
                        <th>Nama Kategori</th>
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
                        <td>
                            {{-- <a class="btn btn-danger" href="/admin/delete/{{$category->id}}">Hapus</a> --}}
                            <a class="btn btn-danger popup-confirm-delete" href="#" category-id="{{ $category->id }}">Hapus</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection
@section('script')
<script src="{{asset('back-assets/assets/extra-libs/DataTables/datatables.min.js')}}"></script>

<script>    
    $('.popup-confirm-delete').click(function() {
        
        var categories_id = $(this).attr('category-id')
        
        Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        }).then((result) => {
        console.log(result)
        if (result.value === true) {
            Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
            )
            window.location = "/admin/delete/" + categories_id;
        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === 'cancel'
        ) {
            Swal.fire(
            'Cancelled',
            'Your imaginary file is safe :)',
            'error'
            )
            }
        })
    })
</script>
@endsection