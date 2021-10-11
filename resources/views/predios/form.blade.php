@isset($predio)
    <div class="form-group">
        <label for="metros_cuadrados">Predio</label>
        <input type="text" class="form-control" id="id" value="{{ isset($predio) ? $predio->getId() : ''}}" name="id"
               disabled>
    </div>
@endisset
<div class="form-group">
    <label for="metros_cuadrados">Area del predio</label>
    <input type="text" class="form-control" id="metros_cuadrados"
           value="{{ isset($predio) ? $predio->getMetrosCuadrados() : old('metros_cuadrados')}}"
           name="metros_cuadrados">
</div>
@if($errors->has('metros_cuadrados'))
    <div class="alert alert-danger">Este campo es requerido</div>
@endif

<div class="form-group">
    <label for="palmeras_destinadas">Cantidad de palmeras asignadas al predio</label>
    <input type="text" class="form-control" id="palmeras_destinadas"
           value="{{ isset($predio) ? $predio->getPalmerasDestinadas() : old('palmeras_destinadas')}}"
           name="palmeras_destinadas">
</div>
@if($errors->has('palmeras_destinadas'))
    <div class="alert alert-danger">Este campo es requerido</div>
@endif

<div class="form-group">
    <label for="tipo_de_suelo">Tipo de suelo del predio</label>
    <input type="text" class="form-control" id="tipo_de_suelo"
           value="{{ isset($predio) ? $predio->getTipoDeSuelo() : old('tipo_de_suelo')}}"
           name="tipo_de_suelo">
</div>
@if($errors->has('tipo_de_suelo'))
    <div class="alert alert-danger">Este campo es requerido</div>
@endif

<div class="form-group">
    <label for="temperatura">Temperatura del predio</label>
    <input type="text" class="form-control" id="temperatura"
           value="{{ isset($predio) ? $predio->getTemperatura() : old('temperatura')}}"
           name="temperatura">
</div>
@if($errors->has('temperatura'))
    <div class="alert alert-danger">Este campo es requerido</div>
@endif

<div class="form-group">
    <label for="clima">Clima del predio</label>
    <select class="form-control" id="clima" value="{{ isset($predio) ? $predio->getClima() : '' }}" name="clima">
        @if(isset($predio))
            <span>{{old('clima')}}</span>
            <option value="">Seleccione un tipo de clima</option>
            <option value="1" @if($predio->getClima() === 'Calido húmedo') selected='selected' @endif>Calido húmedo</option>
            <option value="2" @if($predio->getClima() === 'Calido subhúmedo' ) selected='selected' @endif>Cálido Subhúmedo</option>
            <option value="3" @if($predio->getClima() === 'Muy seco o seco desértico')  selected='selected' @endif>Muy seco o seco desértico</option>
            <option value="4" @if($predio->getClima() === 'Seco o semiseco') selected='selected' @endif>Seco o Semiseco</option>
            <option value="5" @if($predio->getClima() === 'Templado húmedo') selected='selected' @endif>Templado húmedo</option>
            <option value="6" @if($predio->getClima() === 'Templado subhúmedo') selected='selected' @endif>Templado subhúmedo</option>
        @else
            <option value="">Seleccione un tipo de clima</option>
            <option value="1" @if(old('clima')==1) selected="selected" @endif>Calido húmedo</option>
            <option value="2" @if(old('clima')==2) selected="selected" @endif>Cálido Subhúmedo</option>
            <option value="3" @if(old('clima')==3) selected="selected" @endif>Muy seco o seco desértico</option>
            <option value="4" @if(old('clima')==4) selected="selected" @endif>Seco o Semiseco</option>
            <option value="5" @if(old('clima')==5) selected="selected" @endif>Templado húmedo</option>
            <option value="6" @if(old('clima')==6) selected="selected" @endif>Templado subhúmedo</option>
        @endif
    </select>
</div>
@if($errors->has('clima'))
    <div class="alert alert-danger">Este campo es requerido</div>
@endif

<div class="form-group">
    <label for="humedad">Humedad del predio</label>
    <select class="form-control" id="humedad" value="{{ isset($predio) ? $predio->getHumedad() : ''}}" name="humedad">
        @if(isset($predio))
            <option value="">Seleccione tipo de humedad</option>
            <option value="1" @if($predio->getHumedad() ==='Baja') selected='selected' @endif >Baja</option>
            <option value="2" @if($predio->getHumedad() ==='Media') selected='selected' @endif >Media</option>
            <option value="3" @if($predio->getHumedad() ==='Alta') selected='selected' @endif >Alta</option>
        @else
            <option value="">Seleccione tipo de humedad</option>
            <option value="1" @if(old('humedad')==1) selected="selected" @endif>Baja</option>
            <option value="2" @if(old('humedad')==2) selected="selected" @endif>Media</option>
            <option value="3" @if(old('humedad')==3) selected="selected" @endif>Alta</option>
        @endif
    </select>
</div>
@if($errors->has('humedad'))
    <div class="alert alert-danger">Este campo es requerido</div>
@endif

<div class="form-group">
    <label for="ph">PH del predio</label>
    <input type="text" class="form-control" id="ph" value="{{ isset($predio) ? $predio->getPh() : old('ph')}}" name="ph">
</div>
@if($errors->has('ph'))
    <div class="alert alert-danger">Este campo es requerido</div>
@endif

<div class="form-group">
    <label for="salinidad">Salinidad del predio</label>
    <input type="text" class="form-control" id="salinidad" value="{{ isset($predio) ? $predio->getSalinidad() : old('salinidad')}}"
           name="salinidad">
</div>
@if($errors->has('salinidad'))
    <div class="alert alert-danger">Este campo es requerido</div>
@endif

@isset($predio)
    <div class="form-group">
        <label for="tipo_de_predio">Tipo de predio</label>
        <input type="text" class="form-control" id="tipo_de_predio"
               value="{{ isset($predio) ? $predio->getTipoDePredio() : ''}}" name="tipo_de_predio" disabled>
    </div>
    @if($errors->has('tipo_de_predio'))
        <div class="alert alert-danger">Este campo es requerido</div>
    @endif
@endisset
<button type="submit" class="btn btn-primary">
    Guardar
</button>
