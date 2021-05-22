@extends('layouts.back-layouts')
@section('title')
    Dashboard
@endsection


@section('content')

    <div class="material-card card">
            <div class="card-body">
                    <h4 class="card-title">Daftar Program</h4>

                    @if ($message = Session::get('error'))
                        <div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>	
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif

                    <div class="table-responsive">
                            <table id="zero_config" class="table no-wrap user-table" role="grid" aria-describedby="zero_config_info">
                                    <thead>
                                        <tr role="row">
                                            <th>Status</th>
                                            <th>Orang Melaporkan</th>
                                            <th>Judul Program</th>
                                            <th>Mulai Pada</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($programs as $program)
                                        <tr role="row" class="odd">
                                            <td>@if ($program->isSelected == 1)
                                                <p class="badge badge-success">Program Pilihan</p>
                                            @else
                                                <p class="badge badge-secondary">Program Biasa</p>
                                            @endif
                                            @if ($program->isPublished)
                                                <p class="badge badge-success">Dipublish</p>
                                            @else
                                                <p class="badge badge-danger">Belum Dipublish</p>
                                            @endif</td>
                                            <td>Orang Melaporkan <p class="badge badge-danger badge-pill">{{$program->report->count()}}</p></td>
                                            <td>{{$program->title}}</td>
                                            <td>{{$program->created_at->toDateString()}}</td>
                                            
                                            <td>{{ $program_status[$program->status] }}</td>
                                            
                                            <td>
                                                <a class="btn btn-sm btn-secondary" href="/admin/detail/{{$program->id}}">Detail</a>
                                                <a class="btn btn-sm btn-danger popup-confirm-delete" href="/admin/hapus/{{$program->id}}">Hapus</a>

                                                @if ($program->status == 'active')
                                                    <a class="btn btn-sm btn-danger popup-confirm-action" href="/admin/program/{{$program->id}}/pause">Pause</a>
                                                    <a class="btn btn-sm btn-danger popup-confirm-action" href="/admin/program/{{$program->id}}/stop">Stop</a>
                                                @endif

                                                @if ($program->status == 'pause')
                                                    <a class="btn btn-sm btn-success popup-confirm-action" href="/admin/program/{{$program->id}}/active">Start</a>
                                                @endif

                                                @if ($program->status == 'stop')
                                                    <a class="btn btn-sm btn-success popup-confirm-action" href="/admin/program/{{$program->id}}/active">Activate</a>
                                                @endif
                                            </td>
                                            
        
                                            
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                    </div>
                </div>
    </div>

@endsection
@section('script')
<script src="{{asset('back-assets/assets/extra-libs/DataTables/datatables.min.js')}}"></script>
@endsection