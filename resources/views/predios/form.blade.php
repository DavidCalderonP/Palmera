@isset($predio)
    <div class="form-group">
        <div class="row">
            <div class="col">
                <label for="metros_cuadrados">Predio</label>
                <input type="text" class="form-control" id="id" value="{{ isset($predio) ? $predio->getId() : ''}}"
                       name="id" readonly="readonly">
            </div>

        </div>
    </div>
@endisset
<div class="form-group">
    <div class="row">
        <div class="col">
            <label for="metros_cuadrados">Area del predio</label>
            <input type="text" class="form-control" id="metros_cuadrados"
                   value="{{ isset($predio) ? $predio->getMetrosCuadrados() : old('metros_cuadrados')}}"
                   name="metros_cuadrados">
        </div>
    </div>
    @if($errors->has('metros_cuadrados'))
        <div class="alert alert-danger">Este campo es requerido</div>
    @endif
</div>
<div class="form-group">
    <div class="row">
        <div class="col">
            <label for="numero_palmeras">Número de palmeras</label>
            <input type="text" class="form-control" id="numero_palmeras"
                   value="{{ isset($predio) ? $predio->getNumeroDePalmeras() : old('numero_palmeras')}}"
                   name="numero_palmeras">
            @if($errors->has('numero_palmeras'))
                <div class="alert alert-danger">Este campo es requerido</div>
            @endif
        </div>
        <div class="col">
            <label for="tipo_de_suelo">Tipo de suelo del predio</label>
            <select class="form-control" id="tipo_de_suelo"
                    value="{{ isset($predio) ? $predio->suelos->getNombre() : old('tipo_de_suelo')}}"
                    name="tipo_de_suelo">
                @if(isset($predio))
                    <option value="">Seleccione un tipo de suelo</option>
                    <option value="1"
                            @if($predio->suelos->getNombre() === 'Suelos arenosos') selected='selected' @endif>
                        Suelos arenosos
                    </option>
                    <option value="2"
                            @if($predio->suelos->getNombre() === 'Suelos calizos') selected='selected' @endif>
                        Suelos calizos
                    </option>
                    <option value="3"
                            @if($predio->suelos->getNombre() === 'Suelos arcillosos')  selected='selected' @endif>
                        Suelos arcillosos
                    </option>
                    <option value="4"
                            @if($predio->suelos->getNombre() === 'Suelos pedregosos') selected='selected' @endif>
                        Suelos pedregosos
                    </option>
                    <option value="5"
                            @if($predio->suelos->getNombre() === 'Suelos Mixtos') selected='selected' @endif>
                        Suelos Mixtos
                    </option>
                @else
                    <option value="">Seleccione un tipo de suelo</option>
                    <option value="1" @if(old('tipo_de_suelo')==1) selected="selected" @endif>Suelos arenosos</option>
                    <option value="2" @if(old('tipo_de_suelo')==2) selected="selected" @endif>Suelos calizos</option>
                    <option value="3" @if(old('tipo_de_suelo')==3) selected="selected" @endif>Suelos arcillosos</option>
                    <option value="4" @if(old('tipo_de_suelo')==4) selected="selected" @endif>Suelos pedregosos</option>
                    <option value="5" @if(old('tipo_de_suelo')==5) selected="selected" @endif>Suelos Mixtos</option>
                @endif
            </select>
            @if($errors->has('tipo_de_suelo'))
                <div class="alert alert-danger">Este campo es requerido</div>
            @endif
        </div>
    </div>
</div>

<div class="form-group">
    <div class="row">
        <div class="col">
            <label for="ph">PH del predio</label>
            <input type="text" class="form-control" id="ph" value="{{ isset($predio) ? $predio->getPh() : old('ph')}}"
                   name="ph">
            @if($errors->has('ph'))
                <div class="alert alert-danger">Este campo es requerido</div>
            @endif
        </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
        <div class="col">
            <label for="salinidad">Salinidad del predio</label>
            <input type="text" class="form-control" id="salinidad"
                   value="{{ isset($predio) ? $predio->getSalinidad() : old('salinidad')}}"
                   name="salinidad">
            @if($errors->has('salinidad'))
                <div class="alert alert-danger">Este campo es requerido</div>
            @endif
        </div>
        <div class="col">

            <div class="form-group">
                <label for="tipo_de_predio">Tipo de predio</label>
                <select type="text"
                        class="form-control"
                        id="tipo_de_predio"
                        value="{{ isset($predio) ? $predio->getTipoDePredio() == 0 ? 'No Orgánico' : 'Orgánico' : old('tipo_de_predio')}}"
                        name="tipo_de_predio" {{ isset($predio) ? 'disabled' : ''  }} >
{{--                    {{ isset($predio) ? 'disabled' : '' }}>--}}
                    @if(isset($predio))
                        <option value="">Seleccione tipo de predio</option>
                        <option value="0" @if($predio->getTipoDePredio() == 0) selected='selected' @endif>No Orgánico
                        </option>
                        <option value="1" @if($predio->getTipoDePredio() == 1) selected='selected' @endif>Orgánico
                        </option>
                    @else
                        <option value="">Seleccione tipo de predio</option>
                        <option value="0"
                                @if(old('tipo_de_predio')==0 && old('tipo_de_predio')!==null) selected="selected" @endif>
                            No
                            Orgánico
                        </option>
                        <option value="1" @if(old('tipo_de_predio')==1) selected="selected" @endif>Orgánico</option>
                    @endif
                </select>
                @if($errors->has('tipo_de_predio'))
                    <div class="alert alert-danger">Este campo es requerido</div>
                @endif
            </div>
        </div>
    </div>

</div>
<div class="form-group">
    <div class="row">
        <div class="col">
            <label>Descripción</label>
            <input type="text" class="form-control" id="descripcion"
                   value="{{ isset($predio) ? $predio->getDescripcion() : old('descripcion')}}"
                   name="descripcion">
            @if($errors->has('descripcion'))
                <div class="alert alert-danger">Este campo es requerido</div>
            @endif
        </div>
    </div>
</div>

{{--<div class="form-group">--}}
{{--    <div class="row">--}}
{{--        <div class="col">--}}
{{--            <label>Latitud</label>--}}
{{--            <input type="text" class="form-control" id="latitud"--}}
{{--                   value="{{ isset($predio) ? $predio->getLatitud() : old('latitud')}}"--}}
{{--                   name="latitud">--}}
{{--            @if($errors->has('latitud'))--}}
{{--                <div class="alert alert-danger">Este campo es requerido</div>--}}
{{--            @endif--}}
{{--        </div>--}}

{{--        <div class="col">--}}
{{--            <label>Longitud</label>--}}
{{--            <input type="text" class="form-control" id="longitud"--}}
{{--                   value="{{ isset($predio) ? $predio->getLongitud() : old('longitud')}}"--}}
{{--                   name="longitud">--}}
{{--            @if($errors->has('longitud'))--}}
{{--                <div class="alert alert-danger">Este campo es requerido</div>--}}
{{--            @endif--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
@isset($predio)
    <div class="form-group">
        <div class="row">
            <div class="col">
                <label for="fecha_creacion">Fecha de creación</label>
                <input type="text" class="form-control" id="fecha_creacion"
                       value="{{ isset($predio) ? $predio->getFechaCreacion(): old('fecha_creacion')}}"
                       name="fecha_creacion" readonly="readonly">
                @if($errors->has('fecha_creacion'))
                    <div class="alert alert-danger">Este campo es requerido</div>
                @endif
            </div>
        </div>
    </div>

    <div class="form-group" hidden>
        <div class="row">
            <div class="col">
                <label for="estatus">Estatus</label>
                <input type="text" class="form-control" id="estatus"
                       value="{{ isset($predio) ? $predio->getEstatus(): old('estatus')}}"
                       name="estatus" hidden readonly="readonly">
                @if($errors->has('estatus'))
                    <div class="alert alert-danger">Este campo es requerido</div>
                @endif
            </div>
        </div>
    </div>
@endisset
<button type="submit" class="btn btn-primary" onclick="return confirm('¿Desea continuar con la operación?')">
    Guardar
</button>
