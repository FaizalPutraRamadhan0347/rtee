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
<form>
    <label class="col-6" for="persen">Operational Percentage</label>
    <div class="input-group mb-3 col-6">
        <input type="number" id="persen" class="form-control" placeholder="Percentage" aria-label="Percentage" aria-describedby="button-addon2">
        <div class="input-group-append">
          <button class="btn btn-secondary" type="button" id="button-addon2">%</button>
        </div>
    </div>
    <div class="form-group col-6">
      <label for="rekbank">Bank Account Information</label>
      <textarea class="form-control" id="rekbank" rows="8"></textarea>
        <button type="button" class="btn btn-primary mt-4">Save</button>
    </div>
  </form>
@endsection