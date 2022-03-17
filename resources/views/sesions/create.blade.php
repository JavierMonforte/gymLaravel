@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <h1>Creación de sesiones</h1>

        <form action="/sesions" method="post">
        @csrf
        <div>
            <label for="inicio">Inicio</label>
            <input type="datetime-local" name="inicio"> 
        </div>

        <div>
            <label for="Fin">Fin</label>
            <input type="datetime-local" name="fin"> 
        </div>
        <div>
            <label for="activity_id">Actividad</label>
            <input type="text" name="activity_id"> 
        </div>
        <div>
            <input type="submit" value="crear"> 
        </div>        
        </form>
        </div>
    </div>

</div>
@endsection