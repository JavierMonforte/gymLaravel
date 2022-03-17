@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <h1>Creación de Actividades</h1>

        <form action="/activities" method="post">
        @csrf
        <div>
            <label for="name">Nombre</label>
            <input type="text" name="name"> 
        </div>

        <div>
            <label for="descripcion">Descripcion</label>
            <input type="text" name="descripcion"> 
        </div>

        <div>
            <label for="duracion">Duracion</label>
            <input type="text" name="duracion"> 
        </div>
        <div>
            <label for="participantes">Participantes</label>
            <input type="text" name="participantes"> 
        </div>
        <div>
            <input type="submit" value="crear"> 
        </div>        
        </form>
        </div>
    </div>

</div>
@endsection