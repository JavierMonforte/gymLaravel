@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Actualización de Usuario Id = {{$user->id}}</h1>

            <form action="/users/{{$user->id}}" method="post">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <div>
                    <label for="dni">dni</label>
                    <input type="text" name="dni" value="{{$user->dni}}">
                </div>

                <div>
                    <label for="name">Nombre</label>
                    <input type="text" name="name" value="{{$user->name}}">
                </div>
                <div>
                    <label for="email">email</label>
                    <input type="text" name="email" value="{{$user->email}}">
                </div>
                <div>
                    <label for="password">Contraseña</label>
                    <input type="password" name="password" value="{{$user->password}}">
                </div>
                <div>
                    <select name="role" id="">

                        @forelse ($roles as $role)
                        <option value="{{$role->id}}" name="role_id">{{$role->name}}</option>
                        @empty
                        @endforelse

                    </select>
                </div>
                <div>
                    <label for="altura">Altura</label>
                    <input type="text" name="altura" value="{{$user->altura}}">
                </div>
                <div>
                    <label for="peso">Peso</label>
                    <input type="text" name="peso" value="{{$user->peso}}">
                </div>
                <div>
                    <label for="fechaNacimiento">Fecha Nacimiento</label>
                    <input type="datetime" name="fechaNacimiento" value="{{$user->fechaNacimiento}}">
                </div>

                <div>
                    <label for="sexo">Genero</label>
                    <input type="text" name="sexo" value="{{$user->sexo}}">
                </div>

                <div>
                    <input type="submit" value="actualizar">
                </div>
            </form>
        </div>
    </div>

</div>
@endsection