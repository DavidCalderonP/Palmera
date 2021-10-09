<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agenda de contactos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<div class="col-md-8">
    <h3>Predios</h3>
    <table id="userTable" class="table table-striped">
        <tr>
            <th>Nombre</th>
            <th>Telefono</th>
            <th>Correo</th>
            <th></th>
            <th></th>
        </tr>
        @forelse($predios as $predio)
            <div>{{ $predio->getId() }}</div>
            <form method="POST" action="{{ url('/predio/'.$predio->getId()) }}">
                {{@csrf_field()}} {{@method_field('DELETE')}}
                <button class="btn btn-danger form-control" onClick="" type="submit">Eliminar</button>
            </form>
            <button class="btn btn-success form-control" data-target="editar"><a href="{{ route('predio.edit', $predio->getId()) }}">Editar</a></button>
        @empty
            <h1>Valio bertha no hay nanchis</h1>
        @endforelse


        {{--        @forelse($consulta as $contactItem)--}}
        {{--            <tr>--}}
        {{--                <td class="userData" name="name">{{$contactItem->getNombre()}}</td>--}}
        {{--                <td class="userData" name="tel">{{$contactItem->getTelefono()}}</td>--}}
        {{--                <td id="tdAge" class="userData" name="email">{{$contactItem->getCorreo()}}</td>--}}
        {{--                <td align="center" >--}}
        {{--                    <button class="btn btn-success form-control" data-target="editar"><a href="{{ route('contactos.editar', $contactItem->getId()) }}">Editar</a></button>--}}
        {{--                </td>--}}
        {{--                <td align="center">--}}
        {{--                    <form method="POST" action="{{ url('/contacto/'.$contactItem->getId()) }}">--}}
        {{--                        {{@csrf_field()}} {{@method_field('DELETE')}}--}}
        {{--                        <button class="btn btn-danger form-control" onClick="" type="submit">Eliminar</button>--}}
        {{--                    </form>--}}
        {{--                </td>--}}
        {{--            </tr>--}}
        {{--        @empty--}}
        {{--            <tr>--}}
        {{--                <td>No hay contactos agregados</td>--}}
        {{--            </tr>--}}
        {{--        @endforelse--}}
    </table>
</div>

</body>
