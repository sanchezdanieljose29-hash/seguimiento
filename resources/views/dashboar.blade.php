@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

<header>
    <nav>
    <a href="{{route('showLogin')}}" class="btn btn-primary">Iniciar sesión</a>
    <a href="{{route('showRegister')}}" class="btn btn-primary ">Registrarse</a>
</nav>
</header>
<br>
<h1>Panel Principal</h1>



@stop

@section('content')
<p>Bienvenido a mi sistema</p>
@stop