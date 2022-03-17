@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-8">
        <h1>Creacion de Socios</h1>
        <form action="/users" method="post">
        @csrf

           <div>
                <label for="dni">DNI</label>
                <input type="text" name="dni">
            </div>
            <div>
                <label for="name">Nombre</label>
                <input type="text" name="name">
            </div>
            <div>
                <label for="email">email</label>
                <input type="text" name="email">
            </div>
            <div>
                <label for="password">Contraseña</label>
                <input type="password" name="password">
            </div>
            <div>
                <label for="peso">Peso</label>
                <input type="text" name="peso">
            </div>
            <div>
                <label for="altura">Altura</label>
                <input type="text" name="altura">
            </div>
            <div>
                <label for="fechaNacimiento">Fecha Nacimiento</label>
                <input type="date" name="fechaNacimiento">
            </div>
            <div>
                <label for="sexo">Genero</label>
                <input type="text" name="sexo">
            </div>
            <div>
                <select name="role" id="">

                    @forelse ($roles as $role)
                    <option value="{{$role->id}}" name="role_id">{{$role->name}}</option>
                    @empty                   
                    @endforelse

                </select>
            </div>
            <input type="submit" value="crear">

        </form>
    </div>

</div>
@endsection