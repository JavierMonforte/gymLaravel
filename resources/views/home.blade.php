@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}

                </div>
                <!--
                <div>
                    <ul>
                        <li><a href="/activities">Actividades</a>
                            <ul>
                                <li><a href="/activities">Index</a></li>
                            </ul>

                        </li>
                        <li><a href="/sesions">Sesiones</a></li>
                        <li>Usuarios

                            <ul>
                                <li><a href="/users">Gestionar usuarios</a></li>
                                <li><a href="/users/{{Auth::user()->id}}">Mostrar datos</a></li>
                                <li><a href="/users/{{Auth::user()->id}}/edit">Modifica tus datos</a></li>

                            </ul>
                        </li>
                        <li><a href="/roles">Roles</a></li>
                        <li><a href="/reservas">Reservas por actividad y mes</a></li>
                        <li><a href="/reservas/dias">Reservas por dias</a></li>
                        <li><a href="/auth/login">Login</a></li>


                    </ul>

                </div>
-->
            </div>
        </div>
    </div>
</div>
@endsection