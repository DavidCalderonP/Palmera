@isset($predio)
  <div class="form-group">
    <label for="metros_cuadrados">Predio</label>
    <input type="text" class="form-control" id="id" value="{{ isset($predio) ? $predio->getId() : ''}}" name="id" disabled>
  </div>
@endisset
<div class="form-group">
  <label for="metros_cuadrados">Area del predio</label>
  <input type="text" class="form-control" id="metros_cuadrados" value="{{ isset($predio) ? $predio->getMetrosCuadrados() : ''}}" name="metros_cuadrados">
</div>
<div class="form-group">
  <label for="palmeras_destinadas">Cantidad de palmeras asignadas al predio</label>
  <input type="text" class="form-control" id="palmeras_destinadas" value="{{ isset($predio) ? $predio->getPalmerasDestinadas() : ''}}" name="palmeras_destinadas">
</div>
<div class="form-group">
  <label for="tipo_de_suelo">Tipo de suelo del predio</label>
  <input type="text" class="form-control" id="tipo_de_suelo" value="{{ isset($predio) ? $predio->getTipoDeSuelo() : ''}}" name="tipo_de_suelo">
</div>
<div class="form-group">
  <label for="temperatura">Temperatura del predio</label>
  <input type="text" class="form-control" id="temperatura" value="{{ isset($predio) ? $predio->getTemperatura() : ''}}" name="temperatura">
</div>
<div class="form-group">
  <label for="clima">Clima del predio</label>
  <select class="form-control" id="clima" value="{{ isset($predio) ? $predio->getClima() : ''}}" name="clima">
    <option value="">Seleccione un tipo de clima</option>
    <option value="1">Calido húmedo</option>
    <option value="2">Calido subhúmedo</option>
    <option value="3">Muy seco o seco desértico</option>
    <option value="4">Seco o semiseco</option>
    <option value="5">Templado húmedo</option>
    <option value="6">Templado subhúmedo</option>
  </select>
</div>
<div class="form-group">
  <label for="humedad">Humedad del predio</label>
  <select class="form-control" id="humedad" value="{{ isset($predio) ? $predio->getHumedad() : ''}}" name="humedad">
    <option value="">Seleccione tipo de humedad</option>
    <option value="1">Baja</option>
    <option value="2">Media</option>
    <option value="3">Alta</option>
  </select>
</div>
<div class="form-group">
  <label for="ph">PH del predio</label>
  <input type="text" class="form-control" id="ph" value="{{ isset($predio) ? $predio->getPh() : ''}}" name="ph">
</div>
<div class="form-group">
  <label for="salinidad">Salinidad del predio</label>
  <input type="text" class="form-control" id="salinidad" value="{{ isset($predio) ? $predio->getSalinidad() : ''}}" name="salinidad">
</div>  
@isset($predio)
  <div class="form-group">
    <label for="tipo_de_predio">Tipo de predio</label>
    <input type="text" class="form-control" id="salinidad" value="{{ isset($predio) ? $predio->getTipoDePredio() : ''}}" name="tipo_de_predio" disabled>
  </div>   
@endisset 
<button type="submit" class="btn btn-primary">
  Guardar
</button>
{{-- @isset($predio)
  <div class="form-group">
    <label for="metros_cuadrados">Predio</label>
    <input type="text" class="form-control" id="id" value="{{ isset($predio) ? $predio->getId() : ''}}" name="id" disabled>
  </div>
@endisset
<div class="form-group">
  <label for="metros_cuadrados">Area del predio</label>
  <input type="text" class="form-control" id="metros_cuadrados" value="{{ isset($predio) ? $predio->getMetrosCuadrados() : ''}}" name="metros_cuadrados">
</div>
<div class="form-group">
  <label for="palmeras_destinadas">Cantidad de palmeras asignadas al predio</label>
  <input type="text" class="form-control" id="palmeras_destinadas" value="{{ isset($predio) ? $predio->getPalmerasDestinadas() : ''}}" name="palmeras_destinadas">
</div>
<div class="form-group">
  <label for="tipo_de_suelo">Tipo de suelo del predio</label>
  <input type="text" class="form-control" id="tipo_de_suelo" value="{{ isset($predio) ? $predio->getTipoDeSuelo() : ''}}" name="tipo_de_suelo">
</div>
<div class="form-group">
  <label for="temperatura">Temperatura del predio</label>
  <input type="text" class="form-control" id="temperatura" value="{{ isset($predio) ? $predio->getTemperatura() : ''}}" name="temperatura">
</div>
<div class="form-group">
  <label for="clima">Clima del predio</label>
  <select class="form-control" id="clima" value="{{ isset($predio) ? $predio->getClima() : ''}}" name="clima">
    <option value="">Seleccione un tipo de clima</option>
    @if($predio->getClima() === "Calido húmedo")
      <option value="1" selected>Calido húmedo</option>
    @endif
      <option value="1">Calido húmedo</option>
    @if($predio->getClima() === "Calido subhúmedo")
      <option value="2" selected>Calido subhúmedo</option>
    @endif
      <option value="2">Calido subhúmedo</option>
    @if($predio->getClima() === "Muy seco o seco desértico")
      <option value="3" selected>Muy seco o seco desértico</option>
    @endif
      <option value="3">Muy seco o seco desértico</option>
    @if($predio->getClima() === "Seco")
      <option value="4" selected>Seco</option>
    @endif
      <option value="4">Seco</option>
    @if($predio->getClima() === "Semiseco")
      <option value="5" selected>Semiseco</option>
    @endif
      <option value="5">Semiseco</option>
    @if($predio->getClima() === "Templado húmedo")
      <option value="6" selected>Templado húmedo</option>
    @endif
      <option value="6">Templado húmedo</option>
    @if($predio->getClima() === "Templado subhúmedo")
      <option value="7" selected>Templado subhúmedo</option>
    @endif
      <option value="7">Templado subhúmedo</option>
  </select>
</div>
<div class="form-group">
  <label for="humedad">Humedad del predio</label>
  <select class="form-control" id="humedad" value="{{ isset($predio) ? $predio->getHumedad() : ''}}" name="humedad">
    <option value="">Seleccione tipo de humedad</option>
    @if($predio->getHumedad() === "Alta")
      <option value="1" selected>Alta</option>
    @endif
      <option value="1">Alta</option>
    @if($predio->getHumedad() === "Media")
      <option value="2" selected>Media</option>
    @endif
      <option value="2">Media</option>
    @if($predio->getHumedad() === "Baja")
      <option value="3" selected>Baja</option>
    @endif
      <option value="3">Baja</option>
  </select>
</div>
<div class="form-group">
  <label for="ph">PH del predio</label>
  <input type="text" class="form-control" id="ph" value="{{ isset($predio) ? $predio->getPh() : ''}}" name="ph">
</div>
<div class="form-group">
  <label for="salinidad">Salinidad del predio</label>
  <input type="text" class="form-control" id="salinidad" value="{{ isset($predio) ? $predio->getSalinidad() : ''}}" name="salinidad">
</div>  
@isset($predio)
  <div class="form-group">
    <label for="tipo_de_predio">Tipo de predio</label>
    <input type="text" class="form-control" id="salinidad" value="{{ isset($predio) ? $predio->getTipoDePredio() : ''}}" name="tipo_de_predio" disabled>
  </div>   
@endisset 
<button type="submit" class="btn btn-primary">
  Guardar
</button> --}}