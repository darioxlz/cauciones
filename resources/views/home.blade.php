@extends('layouts.app')

@push('styles')
    <style>
        .btnBlackMenu {
            background:#333333;
            color:#BDBDBD;
        }
    </style>
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4 well">
            <a href="{{route('form.register')}}" class="btn btn-block btnBlackMenu">Registrar individuo</a>
            <a href="{{route('form.register')."?create_user=true"}}" class="btn btn-block btnBlackMenu">Registrar usuario</a>

            <hr>

            <a href="{{route('individuals.list')}}" class="btn btn-block btnBlackMenu">Buscar individuos</a>
            <a href="{{route('individuals.list')."?list_users=true"}}" class="btn btn-block btnBlackMenu">Buscar usuarios</a>

            <hr>

            <a href="{{route('logout')}}" class="btn btn-block btnBlackMenu">Salir</a>
        </div>

        <div class="col-md-4 well">
            <a href="{{route('notifications.create')}}" class="btn btn-block btnBlackMenu">Registrar notificación</a>
            <a href="{{route('notifications.create')."?create_caution=true"}}" class="btn btn-block btnBlackMenu">Registrar caución</a>

            <hr>

            <a href="{{route('notifications.list')}}" class="btn btn-block btnBlackMenu">Buscar notificaciones</a>
            <a href="{{route('notifications.list')."?list_cautions=true"}}" class="btn btn-block btnBlackMenu">Buscar cauciones</a>

            <hr>

            <a href="{{route('logout')}}" class="btn btn-block btnBlackMenu">Salir</a>
        </div>
    </div>
</div>
@endsection
