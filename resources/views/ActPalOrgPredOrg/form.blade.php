<div class="form-group">
    <div class="row">
        <div class="col">
            @isset($predios)
                <label for="id_predio">Predio</label>
                <select class="form-control" id="id_predio"
                        name="id_predio">
                    {{--                        value="{{ isset($predio) ? $predio->suelos->getNombre() : old('tipo_de_suelo')}}"--}}
                    <option value="" selected="selected">Seleccione un predio</option>
                    @foreach ($predios as $key => $predio)
{{--                        {{ ( $key == 0) ? 'selected' : '' }}--}}
                        <option value="{{ $predio->getId()  }}">
                            {{ $predio->getId() }}
                        </option>
                @endforeach
                </select>
                @if($errors->has('id_predio'))
                    <div class="alert alert-danger">Este campo es requerido</div>
                @endif
            @endisset
        </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
        <div class="col">
            @isset($actividades)
                <label for="id_actividad">Actividades</label>
                <select class="form-control" id="id_actividad"
                        name="id_actividad">
                    <option value="" selected="selected">Seleccione una actividad</option>
                    @foreach ($actividades as $key => $actividad)
                        <option value="{{ $actividad->getId()  }}">
                            {{ $actividad->getNombreActividad() }}
                        </option>
                    @endforeach
                </select>
                @if($errors->has('id_actividad'))
                    <div class="alert alert-danger">Este campo es requerido</div>
                @endif
            @endisset

        </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
        <div class="col">
            <label for="fecha_programada">Fecha</label>
            <input id="fecha_programada" name="fecha_programada" class="form-control" type="date">
            @if($errors->has('fecha_programada'))
                <div class="alert alert-danger">Este campo es requerido</div>
            @endif
        </div>
    </div>
</div>

<button type="submit" class="btn btn-primary">Enviar Información</button>

