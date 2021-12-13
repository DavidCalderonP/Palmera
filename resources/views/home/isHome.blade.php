@extends('layouts.app')
@section('content')
<div class="container">
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            @foreach(Config::get('constants.data') as $key => $element)
                <li class="{{ $key==0 ? 'active' : '' }}" data-target="#carouselExampleCaptions" data-slide-to="{{ $key }}"></li>
            @endforeach
        </ol>
        <div class="carousel-inner">
            @foreach(Config::get('constants.data') as $key => $element)
                <div class="{{ $key==0 ? 'carousel-item active' :'carousel-item' }}" style="max-height: 40em;" data-interval="3000">
                    <img src="{{asset($element['dir'])}}" class="d-block w-100" alt="...">
                    <div style="border-radius: 20px; color: black; background-color: rgba(255,255,255,0.3);" class="carousel-caption d-none d-md-block">
                        <h2>{{$element['title']}}</h2>
                        <h4>{{$element['description']}}</h4>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div style="text-align: justify; display: flex; margin-top: 3em">
        <div style="width: 50%; border-radius: 20px; border: black solid 1px; margin-right: 3em;">
            <div class="container">
                <h1 style="text-align: center; border-bottom: black solid 1px;">Misión</h1>
                El objetivo del sistema es facilitar la gestión de la producción de dátiles para nuestros colaboradores
                a través de la tecnología. Mejorando el rendimiento de las cosechas, la calidad del trabajo
                y los productos. Así, satisfaciendo a nuestros clientes con productos de gran calidad.
            </div>
        </div>

        <div style="width: 50%; border-radius: 20px; border: black solid 1px;">
            <div class="container">
                <h1 style="text-align: center; border-bottom: black solid 1px;">Visión</h1>
                Ser una aplicación web que cumpla con las necesidades de nuestros clientes,
                ofreciendo una mejor alternativa en la compra de Dátiles,
                brindando una gran variedad de productos para elegir. Para nuestros colaboradores,
                un sistema que facilite sus actividades laborales del día.
            </div>
        </div>
    </div>
</div>
@endsection
