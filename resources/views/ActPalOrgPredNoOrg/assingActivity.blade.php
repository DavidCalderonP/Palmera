@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-1"></div>
        <div class="col-5">
            <form action="{{url('/asignarActividadesPredNoOrg')}}" method="POST">
                @csrf
                @include('ActPalOrgPredNoOrg.form')
            </form>
        </div>
        <div class="col-1"></div>
        @isset($data)
            <div class="col-4">
            <table class="table" style="background-color: rgb(200,200,200); border-radius: 20px;">
{{--                <thead class="thead-dark">--}}
                <thead style="border-radius: 20px !important; background-color: black; color: white">
                <tr>
                    <th scope="col">Palmera</th>
                    <th scope="col">Actividad</th>
                    <th scope="col">Fecha</th>
                </tr>
                </thead>
                <tbody>
{{--                Data es la coleccion de palmeras--}}
{{--                Data[indice]->actividades es la coleccion recolentada de actividades por cada palmera de data--}}
                @forelse($data as $key => $element)
{{--                    @foreach($palmera->actividades as $index => $actividad)--}}
                        <tr>
{{--                            <th scope="col">{{$element->getId()}}</th>--}}
                            <th scope="col">{{$element->getIdPalmera()}}</th>
                            <th scope="col">{{$element->obtenerActividad->getNombreActividad()}}</th>
                            <th scope="row">{{$element->getFechaProgramada()}}</th>
{{--                            <th scope="row">{{$palmera->getId()}}</th>--}}
{{--                            <th scope="row">{{$actividad->getNombreActividad()}}</th>--}}
{{--                            <th scope="row">{{$data[$key]->fechas[$index]->getFechaProgramada()}}</th--}}
                        </tr>
{{--                    @endforeach--}}
                @empty
                    <div>Palmera sin actividades asignadas aún.</div>
                @endforelse
                </tbody>
            </table>
            </div>

{{--            <div>{{$data[0]->fechas}}</div>--}}
        @endisset
    </div>
@endsection
