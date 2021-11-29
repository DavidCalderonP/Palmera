<div class="form-group">
    <div class="row">
        <div class="col">
            @isset($predios)
                <label for="id_predio">Predio Orgánico</label>
                <select class="form-control" id="id_predio"
                        onchange="this.form.submit()"
                        value="{{old('id_predio')}}"
                        name="id_predio">
                    <option value="" selected="selected">Seleccione un predio orgánico</option>
                    @foreach ($predios as $key => $predio)
                        {{--                        {{ ( $key == 0) ? 'selected' : '' }}--}}
                        <option
                            @if($predio->getId() == $cache) selected='selected' @endif
                            value="{{ $predio->getId()   }}"
                        {{old('id_predio') == $predio->getId() ? 'selected' : ''}}>{{ $predio->getId() }}</option>
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
                <label for="actividad_id">Actividades</label>
                <select class="form-control" id="actividad_id"
                        value="{{old('actividad_id')}}"
                        name="actividad_id">
                    <option value="" selected="selected">Seleccione una actividad</option>
                    @foreach ($actividades as $key => $actividad)
                        <option value="{{ $actividad->getId()  }}" {{old('actividad_id') == $actividad->getId() ? 'selected' : ''}}>
                            {{ $actividad->getNombreActividad() }}
                        </option>
                    @endforeach
                </select>
                @if($errors->has('actividad_id'))
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
            <input id="fecha_programada" value="{{old('fecha_programada')}}" name="fecha_programada" min="{{now('GMT-7')->format('Y-m-d')}}" class="form-control" type="date">
            @if($errors->has('fecha_programada'))
                <div class="alert alert-danger">Este campo es requerido</div>
            @endif
        </div>
    </div>
</div>

<button type="submit" class="btn btn-primary" onclick="return confirm('¿Desea continuar con la operación?')">Enviar Información</button>
