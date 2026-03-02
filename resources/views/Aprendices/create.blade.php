@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')


<h1>Registrar Aprendices</h1>



<div class="card">
    <div class="card-header">
        <form action="{{ route('aprendices.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-row">
                <div class="col">
                    <label for="Nombres">Nombres</label>
                    <input name="Nombres" type="text" class="form-control" id="Nombres" placeholder="Nombres">
                </div>
                <div class="col">
                    <label for="Apellidos">Apellidos</label>
                    <input name="Apellidos" type="text" class="form-control" id="Apellidos" placeholder="Dos apellidos">
                </div>
            </div>

            <div class="form-group col-md-4">
                <label for="tbltiposdocumentos_NIS">Tipo de documentos</label>
                <select name="tbltiposdocumentos_NIS" id="tbltiposdocumentos_NIS" class="form-control">
                    <option selected>Selecciona</option>
                    <option value="1">Cédula de ciudadania</option>
                    <option value="2">Tarjeta de identidad</option>
                    <option value="3">Cédula de extranjería</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="Ndoc">Número de documento</label>
                <input type="number" name="Ndoc" class="form-control" id="Ndoc" placeholder="Número de documento">
            </div>
    </div>
    <div class="form-group">
        <label for="Direccion">Direccion</label>
        <input type="text" name="Direccion" class="form-control" id="Direccion" placeholder="Direccion">
    </div>
    <div class="form-group">
        <label for="Telefono">Telefono</label>
        <input type="text" name="Telefono" class="form-control" id="Telefono" placeholder="Telefono">
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="CorreoInstitucional">Correo Institucional</label>
            <input type="text" name="CorreoInstitucional" class="form-control" id="CorreoInstitucional" placeholder="pepito@gmail.com">
        </div>
        <div class="form-group col-md-6">
            <label for="CorreoPersonal">Correo Personal</label>
            <input type="text" name="CorreoPersonal" class="form-control" id="CorreoPersonal" placeholder="pepito@gmail.com">
        </div>
        <div class="form-group col-md-4">
            <label for="Sexo">Sexo</label>
            <select name="Sexo" id="Sexo" class="form-control">
                <option selected>Selecciona</option>
                <option value="1">Masculino</option>
                <option value="0">Femenino</option>
            </select>
        </div>
        <div class="form-group col-md-2">
            <label for="FechaNac">FechaNac</label>
            <input name="FechaNac" type="text" class="form-control" id="FechaNac" placeholder="yyyy-mm-dd">
        </div>

        <div class="form-group col-md-4">
            <label for="tbleps_NIS">EPS</label>
            <select id="tbleps_NIS" class="form-control" name="tbleps_NIS">
                <option selected>Selecciona EPS</option>
                <option value="1">Salud Total EPS-S S.A.</option>
                <option value="2"> EPS Sanitas S.A.S.</option>
            </select>
        </div>

    </div>

    {{-- Footer --}}
    <div class="card-footer text-right">
        <a href="{{ route('aprendices.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Volver
        </a>

    </div>
    <button type="submit" class="btn btn-primary">Subir</button>
    </form>



    @stop