@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Creación de Sesiones Automatico</h1>

            <form action="/sesions" method="post">
                @csrf
                <div>
                    <label for="fecha">Elija una fecha de mes</label>
                    <input type="date" name="fecha">
                </div>

                <div>
                    <input type="checkbox" id="cbox1" value="Monday" name="dias[]"> <label>Lunes</label><br>
                    <input type="checkbox" id="cbox2" value="Tuesday" name="dias[]"> <label for="cbox2">Martes</label><br>
                    <input type="checkbox" id="cbox3" value="Wednesday" name="dias[]"> <label for="cbox2">Miercoles</label><br>
                    <input type="checkbox" id="cbox4" value="Thursday" name="dias[]"> <label for="cbox2">Jueves</label><br>
                    <input type="checkbox" id="cbox5" value="Friday" name="dias[]"> <label for="cbox2">Viernes</label><br>
                    <input type="checkbox" id="cbox5" value="Saturday" name="dias[]"> <label for="cbox2">Sabado</label><br>
                    <input type="checkbox" id="cbox5" value="Sunday" name="dias[]"> <label for="cbox2">Domingo</label><br>

                </div>
                <div>
                    <label for="inicio">Inicio</label>
                    <input type="time" name="inicio">
                </div>
                <div>
                    <label for="fin">fin</label>
                    <input type="time" name="fin">
                </div>
                <select name="activity">
                @forelse ($activities as $activity)
                    <option value="{{$activity->id}}" name="activity">{{$activity->name}}</option>
                @empty
                @endforelse
                </select>
                <div>
                    <input type="submit" value="crear">
                </div>
            </form>
        </div>
    </div>

</div>
@endsection