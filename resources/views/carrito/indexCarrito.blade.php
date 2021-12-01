@extends('layouts.app')
@section('content')
<div class="row">
  <div class="container">
    <div class="col-12">
      <div class="row">
        <div class="col">
          <div class="row">
            <div class="col-12">
              <h1>Carrito de compras.</h1>
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
                    </th>
                </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Imagen</td>
                    <td>Datil 1</td>
                    <td>Información del datil</td>
                  </tr>
                  <tr>
                    <td></td>
                    <td>SubTotal: $100000</td>
                    <td>Proceder al pago</td>
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