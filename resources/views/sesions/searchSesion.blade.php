@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Actualización de estudios</h1>
            <form action="#" method="post">
                @csrf
                <select name="select">
                @forelse ($activities as $activity)
                    <option value="{{$activity->id}}">{{$activity->name}}</option>
                @empty
                @endforelse
                </select>


                <input type="hidden" name="_method" value="PUT">
                <div>
                    <label for="name">Nombre</label>
                    <input type="text" name="name" value="{{$activity->name}}">
                </div>

                <div>
                    <label for="descripcion">Descripcion</label>
                    <input type="text" name="descripcion" value="{{$activity->descripcion}}">
                </div>

                <div>
                    <label for="abreviation">Duracion</label>
                    <input type="text" name="duracion" value="{{$activity->duracion}}">
                </div>
                <div>
                    <label for="participantes">Participantes</label>
                    <input type="text" name="participantes" value="{{$activity->participantes}}">
                </div>
                <div>
                    <input type="submit" value="actualizar">
                </div>
            </form>
        </div>
    </div>

</div>
@endsection