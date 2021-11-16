@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="container">
            <div class="col-12">
                <table class="table table-hover">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">Identificador</th>
                        <th scope="col">Area(m2)</th>
                        <th scope="col">No. Palmeras</th>
                        <th scope="col">Suelo</th>
                        <th scope="col">PH</th>
                        <th scope="col">Salinidad</th>
                        <th scope="col">Tipo de predio</th>
                        <th scope="col">Latiud</th>
                        <th scope="col">Longitud</th>
                        <th colspan="2">
                            <a href="{{ url('/predio/create')}}">
                                <button class="btn btn-success">
                                    Agregar Predio
                                </button>
                            </a>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($res as $predio)
                        <tr>
                            <th scope="row">{{$predio->getId()}}</th>
                            <td>{{$predio->getMetrosCuadrados()}}</td>
                            <td>{{$predio->getNumeroDePalmeras()}}</td>
                            <td>{{$predio->suelos->getNombre()}}</td>
                            <td>{{$predio->getPh()}}</td>
                            <td>{{$predio->getSalinidad()}}</td>
                            <td>{{$predio->getTipoDePredio()==0 ? "No Orgánico" : "Orgánico"}}</td>
                            <td>{{$predio->getLatitud()}}</td>
                            <td>{{$predio->getLongitud()}}</td>
                            <td>
                                <a href="{{ url('/predio/'.$predio->getId().'/edit')}}">
                                    <button class="btn btn-warning">
                                        Editar
                                    </button>
                                </a>
                            </td>
                            <td>
                                <form action="{{ url('/predio/'.$predio->getId())}}" method="post">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <button class="btn btn-danger" type="submit"
                                            onclick="return confirm('¿Desea borrar el predio seleccionado?')">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <div>No se encontró ningún predio</div>
                    @endforelse
                    </tbody>
                </table>

            </div>
            <div style="display: inline-flex !important;">
                {{$res->links("pagination::bootstrap-4")}}
            </div>
        </div>
    </div>
@endsection
