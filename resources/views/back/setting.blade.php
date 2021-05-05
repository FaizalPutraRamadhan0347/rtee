@extends('layouts.back-layouts')
@section('title')
    Settings
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
{{-- {{ dd($global_settings) }} --}}
<form action="updateGlobal" method="POST">
  {{ csrf_field() }}

    <label class="col-6" for="persen">Operational Percentage</label>
    <div class="input-group mb-3 col-6">
        <input type="number"  name="persen" id="persen" class="form-control" placeholder="Percentage" aria-label="Percentage" aria-describedby="button-addon2" value="{{ $global_setting->persen }}">
        <div class="input-group-append">
          <p class="btn btn-outline-secondary" id="button-addon2">%</p>
        </div>
    </div>
    <div class="form-group col-6">
      <label for="rekbank">Bank Account Information</label>
      <textarea class="form-control" name="inforekening" id="rekbank" rows="8">{{ $global_setting->inforekening }}</textarea>
      <button type="submit" class="btn btn-primary mt-4">Save</button>
    </div>
</form>


@endsection