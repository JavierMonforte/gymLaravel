@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">

            <h1>RESERVA TU SESION
                <!--<a href="/activities/create" class="btn btn-primary float-right">
                    Nuevo
                </a>-->
            </h1>
            <form action="" id="formulario" class="col-md-08">
            @csrf
            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                <select id='actividad' name="id" class="col-md-8">
                    <option value="">Seleccione actividad</option>

                    @forelse ($activities as $activity)
                    <option value="{{$activity->id}}">{{$activity->name}}</option>
                    @empty
                    <option value="null">No hay estudios registrados</option>
                    @endforelse
                </select>
                <br>
                <select id='mes' name="mes" class="col-md-8">
                    <option value="0" name="mes">Elija mes</option>
                    <option value="1" name="mes">Enero</option>
                    <option value="2" name="mes">Febrero</option>
                    <option value="3" name="mes">Marzo</option>
                    <option value="4" name="mes">Abril</option>
                    <option value="5" name="mes">Mayo</option>
                    <option value="6" name="mes">Junio</option>
                    <option value="7" name="mes">Julio</option>
                    <option value="8" name="mes">Agosto</option>
                    <option value="9" name="mes">Septiembre</option>
                    <option value="10" name="mes">Octubre</option>
                    <option value="11" name="mes">Noviembre</option>
                    <option value="12" name="mes">Diciembre</option>

                </select>

                <!-- <input type="text" id="filtro">
                <input type="submit">-->
            </form>
            <br>
            <br>

            <div id="destinofiltro" class="col-md-8">
            </div>
            <script src="./jquery-3.6.0.min.js"></script>
            <script src="/js/llamadaajax.js"></script>




        </div>
    </div>
</div>
@endsection