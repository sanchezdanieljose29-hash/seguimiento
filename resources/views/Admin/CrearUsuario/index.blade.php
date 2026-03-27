@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')


@stop

@section('content')
    {{-- El componente ya no necesita body extra --}}
    <livewire:create/>
@stop