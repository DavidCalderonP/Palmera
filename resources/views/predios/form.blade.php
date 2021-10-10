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
    <option value="4">Seco</option>
    <option value="5">Semiseco</option>
    <option value="6">Templado húmedo</option>
    <option value="7">Templado subhúmedo</option>
  </select>
</div>
<div class="form-group">
  <label for="humedad">Humedad del predio</label>
  <select class="form-control" id="humedad" value="{{ isset($predio) ? $predio->getHumedad() : ''}}" name="humedad">
    <option value="">Seleccione tipo de humedad</option>
    <option value="1">Alta</option>
    <option value="2">Media</option>
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
</button>