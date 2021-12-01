@extends('layouts.app')

@section('content')
<div class="row">
  <div class="container">
    <div class="col-12">
      <div class="row">
        <div class="col-10">
          <table class="table table-hover">
            <thead class="thead-dark">
            <tr>
                <th scope="col"></th>
                <th scope="col-3">Nombre.</th>
                <th scope="col">Descripción.</th>
                <th scope="col">Tipo.</th>
                <th scope="col">Precio.</th>
                <th colspan="2">
                </th>
            </tr>
            </thead>
            <tbody>
            @forelse($productos as $producto)
                <tr>
                    <th scope="row"><img src={{url('/assets/datil.jpg') }} width="50%"></th>
                    <td> Datil {{$producto->getNombreDatil()}}</td>
                    <td> Datil {{$producto->getDescripcion()}}</td>
                    @if($producto->getTipo_Datil()===0)
                      <td>Orgánico</td>
                    @else
                      <td>No Orgánico</td>
                    @endif
                    <td> ${{$producto->getCosto()}}</td>
                    <td>
                      <a href="{{ url('/predio/create')}}">
                          <button class="btn btn-success">
                              Agregar al carrito
                          </button>
                      </a>
                    </td>
                </tr>
            @empty
                <div>No se encontró ningún producto</div>
            @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection