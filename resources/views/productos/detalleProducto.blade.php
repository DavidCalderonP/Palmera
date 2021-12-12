<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
          <input type="text" value="{{$producto->getId()}}" name="Id">
          <input type="text" value="{{auth()->user()->id}}" name="userID">
          <h1>{{$producto->getNombreDatil()}}</h1>
          <p>{{$producto->getDescripcion()}}</p>
          <h3>Precio de venta: {{$producto->getCosto()}}</h3>
          <h3>Tipo de cosecha: {{$producto->getTipo_datil()}}</h3>
          <label for="exampleInputEmail1">Cantidad deseada (kgs.)</label>
          <input label="Cantidad deseada" type="number" name="cantidad">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Agregar al carrito</button>
        </form>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>