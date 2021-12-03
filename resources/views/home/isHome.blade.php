@extends('layouts.app')
@section('content')
{{--    <div>{{ var_dump(Config::get('constants.data')) }}</div>--}}
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="4"></li>
        </ol>
        <div class="carousel-inner">
            @foreach(Config::get('constants.data') as $key => $element)
                <div class="{{ $key==0 ? 'carousel-item active' :'carousel-item'  }}" data-interval="3000">
                    <img src="{{asset($element['dir'])}}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
