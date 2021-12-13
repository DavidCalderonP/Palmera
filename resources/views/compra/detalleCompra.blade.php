@extends('layouts.app')
@section('content')
<div class="row">
  <div class="container">
    <div class="col-12">
      <div class="row">
        <div class="col">
          <div class="row">
            <div class="col-12">
              <h1>Detalle de la compra.</h1>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <h1>Datos del usuario</h1>
              <h3>Nombre: {{auth()->user()->name}}</h3>
              <h3>Clave de usuario: {{auth()->user()->id}}</h3>
              <h3>Clave de correo: {{auth()->user()->email}}</h3>
            </div>
          </div>
          <div class="row">
          <div class="class-10 border border-dark">
                <table class="table table-hover">
                  <thead class="thead-dark">
                  <tr>
                      <th scope="col"></th>
                      <th scope="col">Articulo</th>
                      <th scope="col">Descripción</th>
                      <th scope="col">Tipo</th>
                      <th scope="col">Cantidad</th>
                      <th scope="col">Precio Unitario.</th>
                      </th>
                  </tr>
                  </thead>
                  @forelse($res as $producto)
                  <tbody>
                    <tr>
                      <td>Imagen</td>
                      <td>{{$producto->productos->getNombreDatil()}}</td>
                      <td>{{$producto->productos->getDescripcion()}}</td>
                      @if($producto->productos->getTipo_datil() === 0)
                        <td>No Organico</td>
                      @else
                        <td>Organico</td>
                      @endif
                      <td>{{$producto->getCantidad()}}</td>
                      <td>{{$producto->productos->getCosto()}}</td>
                    </tr>
                  @empty
                    <h1>No se han agregado productos al carrito de compras</h1>
                  @endforelse
                    <tr>
                      <td>
                        <a href="{{url('/carrito')}}">
                          <button class="btn btn-success">Regresar</button>
                        </a>
                      </td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td>Total: {{$importe}}</td>
                      <td>
                        <a href="{{url('/tarjeta')}}">
                          <button class="btn btn-success">Proceder a pagar</button>
                        </a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection