<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Actividad nº {{$activity->id}}</h1>


    <ul>
        <li>
            <strong>Actividad</strong>
            {{ $activity->name }}
        </li>
        <li>
            <strong>Descripcion</strong>
            {{ $activity->descripcion}}
        </li>
        <li>
            <strong>Duracion</strong>
            {{ $activity->duracion }}
        </li>
        <li>
            <strong>Participantes</strong>
            {{ $activity->participantes }}
        </li>
        <li>
            <ul>
                @foreach ($activity->sesions as $sesion)
                <li>{{$sesion->inicio}} - {{$sesion->fin}}</li>

                @endforeach
            </ul>
        </li>
    </ul>
</body>

</html>