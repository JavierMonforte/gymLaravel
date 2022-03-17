<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">

    <title>Document</title>
</head>

<body>
<div class="container">

    <h1>Socio nº {{$user->id}}</h1>


    <ul>
        <li>
            <strong>Código</strong>
            {{ $user->dni }}
        </li>
        <li>
            <strong>Nombre</strong>
            {{ $user->name }}
        </li>
        <li>
            <strong>Altura</strong>
            {{ $user->altura }}
        </li>
        <li>
            <strong>Peso</strong>
            {{ $user->peso }}
        </li>
        <li>
            <strong>Fecha Nacimiento</strong>
            {{ $user->fechaNacimiento }}
        </li>
        <li>
            <strong>Sexo</strong>
            {{ $user->sexo }}
        </li>
        <li>
            <strong>Sesiones</strong>
            <table class="table table-striped table-hover table-responsive col-4">
            @forelse ($user->sesions as $sesion)
            <tr>
            <td><input type="datetime" readonly value='{{$sesion->inicio}}'></td>
            <td><input type="datetime" readonly value='{{$sesion->fin}}'></td>
                <td>{{$sesion->activity->name}} </td>
                <td> <a href="/sesions/{{$sesion->id}}">Ver</a></td>
            </tr>
            @empty
            <tr>
                <td colspan="3">No hay Sesiones registrados</td>
            </tr>
            @endforelse
            </table>  
            
        </li>
    </ul>
    </div>

</body>

</html>