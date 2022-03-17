@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">


        <h1>Lista de Sesiones
            <a href="/sesions/create" class="btn btn-primary float-right">
                Nuevo
            </a>
        </h1>


        <table class="table table-striped">
        <tr>
            <th>Id</th>
            <th>Inicio</th>
            <th>Fin</th>
            <th>Actividades</th>
            <th>Ver</th>
            <th>Editar</th>

        </tr>
        @forelse ($sesions as $sesion)
        <tr>
            <td>{{$sesion->id}} </td>
            <td>{{$sesion->inicio}} </td>
            <td>{{$sesion->fin}} </td>
            <td>{{$sesion->activity->name}} </td>
            <td> <a class="btn btn-primary btn-sm" href="/sesions/{{$sesion->id}}">Ver</a></td>
            <td> <a class="btn btn-primary btn-sm" href="/sesions/{{$sesion->id}}/edit">Editar</a></td>
        </tr>
        @empty
        <tr>
            <td colspan="3">No hay estudios registrados</td>
        </tr>
        @endforelse
        </table>
        {{$sesions->links("pagination::bootstrap-4")}}





        </div>
    </div>
</div>
@endsection




