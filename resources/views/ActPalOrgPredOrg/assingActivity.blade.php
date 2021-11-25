@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-1"></div>
        <div class="col-6">
            <form action="{{url('/asignarActividades')}}" method="POST">
                @csrf
                @include('ActPalOrgPredOrg.form')
            </form>
        </div>
        <div class="col-5"></div>
    </div>
@endsection
