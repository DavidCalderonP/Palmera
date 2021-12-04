@extends('layouts.app')
@section('content')
<div>
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            @foreach(Config::get('constants.data') as $key => $element)
                <li class="{{ $key==0 ? 'active' : '' }}" data-target="#carouselExampleCaptions" data-slide-to="{{ $key }}"></li>
            @endforeach
        </ol>
        <div class="carousel-inner">
            @foreach(Config::get('constants.data') as $key => $element)
                <div class="{{ $key==0 ? 'carousel-item active' :'carousel-item' }}" style="max-height: 80em;" data-interval="3000">
                    <img src="{{asset($element['dir'])}}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
