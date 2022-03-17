@extends('layouts.app')

@section('content')
<div class="container">
<body>

<h1>Lista de Usuarios
            <a href="/users/create" class="btn btn-primary float-right">
                Nuevo
            </a>
        </h1>


<table border="1">
<tr>
    <th>DNI</th>
    <th>Nombre</th>
    <th>Peso</th>
    <th>Altura</th>
    <th>Fecha Nacimiento</th>
    <th>Sexo</th>
    <th>Ver</th>
    <th>Editar</th>

</tr>
@forelse ($users as $member)
<tr>
    <td>{{$member->dni}} </td>
    <td>{{$member->name}} </td>
    <td>{{$member->peso}} </td>
    <td>{{$member->altura}} </td>
    <td>{{$member->fechaNacimiento}} </td>
    <td>{{$member->sexo}} </td>

    <td> <a a class="btn btn-primary btn-sm" href="/users/{{$member->id}}">Ver</a></td>
    <td> <a class="btn btn-primary btn-sm" href="/users/{{$member->id}}/edit">Editar</a></td>


</tr>
@empty
<tr>
    <td colspan="3">No hay estudios registrados</td>
</tr>
@endforelse
</table>

</body>
@endsection
