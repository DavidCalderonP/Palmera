@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-2"></div>
    <div class="col-8">
      <table class="table table-hover">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Identificador</th>
            <th scope="col">Area</th>
            <th scope="col">No. Palmeras</th>
            <th scope="col">Suelo</th>
            <th scope="col">Temperatura</th>
            <th scope="col">Clima</th>
            <th scope="col">Humedad</th>
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
          @forelse($res as $key => $predio)
            <tr>
              <th scope="row">{{$predio->getId()}}</th>
              <td>{{$predio->getMetrosCuadrados()}}</td>
              <td>{{$predio->getPalmerasDestinadas()}}</td>
              <td>{{$predio->getTipoDeSuelo()}}</td>
              <td>{{$predio->getTemperatura()}}</td>
              <td>{{$predio->getClima()}}</td>
              <td>{{$predio->getHumedad()}}</td>
              <td>
                <button class="btn btn-warning">
                  <a href="{{ url('/predio/'.$predio->getId().'/edit')}}">
                    Editar
                  </a>
                </button>
              </td>
              <td>
                <form action="{{ url('/predio/'.$predio->getId())}}" method="post">
                  @csrf
                  {{ method_field('DELETE') }}
                  <button class="btn btn-danger" type="submit" onclick="return confirm('¿Desea borrar el predio seleccionado?')">
                    Eliminar
                  </button>
                </form>
              </td>
            </tr>
          @empty
            <tr>
              <th>0</th>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
    <div class="col-2"></div>
  </div>
@endsection