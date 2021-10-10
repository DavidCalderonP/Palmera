@extends('layouts.app')
@section('content')
<div class="row">
  <div class="col-4"></div>
  <div class="col-4">
    <form action="{{url('/predio/'.$predio->getId())}}" method="POST">
      @csrf
      {{ method_field('PATCH') }}
      @include('predios.form')
    </form>
  </div>
  <div class="col-4"></div>
</div>
@endsection