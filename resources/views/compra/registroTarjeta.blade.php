@extends('layouts.app')
@section('content')
<div class="row">
  <div class="container">
    <div class="col-12">
      <div class="row">
        <div class="col">
          <div class="row">
            <div class="col-12">
              <h1>Datos del pago.</h1>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="card w-75">
                <div class="card-body">
                  <h5 class="card-title">Tarjeta de crédito.</h5>
                  <form action="{{url('/registrarVenta')}}" method="POST">
                    @csrf
                    <div class="form-group">
                      <input type="hidden" value="{{auth()->user()->id}}" name="userID">
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Nombre del titular.</label>
                      <input name="nombreTitular" label="nombreTitular" type="text" class="form-control" id="exampleFormControlInput1">
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Numero de tarjeta.</label>
                      <input name="numeroTarjeta" label="numeroTarjeta" type="number" class="form-control" id="exampleFormControlInput1" placeholder="0000-0000-0000-0000">
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col">
                          <label for="exampleFormControlInput1">Mes.</label>
                          <input name="mes" label="mes" type="number" class="form-control" id="exampleFormControlInput1" placeholder="00">
                        </div>
                        <div class="col">
                          <label for="exampleFormControlInput1">Año.</label>
                          <input name="año" label="año" type="number" class="form-control" id="exampleFormControlInput1" placeholder="00">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlInput1">CVE.</label>
                      <input name="cve" label="cve" type="number" class="form-control" id="exampleFormControlInput1" placeholder="000">
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary">Pagar</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection