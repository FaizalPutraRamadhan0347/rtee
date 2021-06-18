@extends('layouts.middle-layouts')
@section('title')
    Buat Laporan Perkembangan
@endsection

@section('content')
<form action="/laporanperkembangan/store" method="post">
  <div class="box">
    <div class="box-header">
      <h3>Tambah Laporan Perkembangan</h3>
    </div>
    <div class="box-body">
        {{ csrf_field() }}
        <input type="hidden" name="program_id" value="{{$program->id}}">
        <div class="form-group label--floating">
            <input type="text" name="title">
            <label>Judul Laporan Perkembangan</label>
        </div>
        <label><p>Deskripsi</p></label>
        <textarea name="description" class="form-control" id="myeditor"></textarea>
    </div>
    <div class="box-footer">
        <button type="submit" class="btn btn-primary">Buat</button>
    </div>
  </div>
</form>
@endsection

@section('script')  
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> 
<script src="{{asset('back-assets/assets/libs/tinymce/tinymce.min.js')}}"></script>
<script  type="text/javascript">        
tinymce.init({
  selector : 'textarea#myeditor',
  plugins: 'quickbars table image link lists media autoresize help',
  toolbar: 'undo redo | formatselect | bold italic | alignleft aligncentre alignright alignjustify | indent outdent | bullist numlist',
  content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
});
</script>
@endsection