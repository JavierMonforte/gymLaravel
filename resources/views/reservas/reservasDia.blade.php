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
            <form action="" id="formularioDias" class="col-md-08">
                @csrf
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                <input type="date" name="fecha" id="fecha">
                <br>
                <input id="submit" type="submit">
            </form>
            <br>
            <br>

            <div id="destinofiltro" class="col-md-8">
            </div>
            <script src="../jquery-3.6.0.min.js"></script>
            <script src="/js/llamadaajax2.js"></script>




        </div>
    </div>
</div>
@endsection