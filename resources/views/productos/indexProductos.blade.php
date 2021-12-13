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
                    <th scope="row">
                      <img src="" width="50%">
                    </th>
                    <td>{{$producto->getNombreDatil()}}</td>
                    <td> Datil {{$producto->getDescripcion()}}</td>
                    @if($producto->getTipo_Datil()===1)
                      <td>Orgánico</td>
                    @else
                      <td>No Orgánico</td>
                    @endif
                    <td> ${{$producto->getCosto()}}</td>
                    <td>
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$producto->getIdVariedad()}}" data>
                        Agregar al carrito
                      </button>
                      <div class="modal fade" id="exampleModal{{$producto->getIdVariedad()}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Detalle producto.</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form action="{{url('/carrito')}}" method="POST">
                                @csrf
                                <input type="text" hidden value="{{$producto->getIdVariedad()}}" name="Id">
                                <input type="text" hidden value="{{auth()->user()->id}}" name="userID">
                                <h1>{{$producto->getNombreDatil()}}</h1>
                                <p>{{$producto->getDescripcion()}}</p>
                                <h3>Precio de venta: {{$producto->getCosto()}}</h3>
                                <h3>Tipo de cosecha: {{$producto->getTipo_datil()}}</h3>
                                <label for="exampleInputEmail1">Cantidad deseada (kgs.)</label>
                                <input label="Cantidad deseada" value=1 type="number" name="cantidad">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <button type="submit"class="btn btn-primary">Agregar al carrito</button>
                              </form>
                            </div>
                            <div class="modal-footer">
                            </div>
                          </div>
                        </div>
                      </div>
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