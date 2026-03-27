@extends('adminlte::master')

@section('body')
<div class="login-box">
    <div class="login-logo">
        <a href="{{ url('/') }}"><b>Admin</b>LTE</a>
    </div>
    
    <div class="card">
        <div class="card-body login-card-body">
            
            @if(session('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{ session('success') }}
            </div>
            @endif

            <p class="login-box-msg">Iniciar sesión</p>

            <form action="{{ route('login') }}" method="POST">
                @csrf
                
                <div class="input-group mb-3">
                    <select name="Tdoc" class="form-control @error('Tdoc') is-invalid @enderror" required>
                        <option value="">Seleccione tipo de documento</option>
                        @foreach($tipodocumentos as $item)
                        <option value="{{ $item->NIS }}">{{ $item->Denominacion }}</option>
                        @endforeach
                    </select>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-id-card"></span>
                        </div>
                    </div>
                    @error('Tdoc')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="input-group mb-3">
                    <input type="text" name="Ndoc" class="form-control @error('Ndoc') is-invalid @enderror" placeholder="Número de documento" required value="{{ old('Ndoc') }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-hashtag"></span>
                        </div>
                    </div>
                    @error('Ndoc')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Contraseña" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember" name="remember">
                            <label for="remember">
                                Recordarme
                            </label>
                        </div>
                    </div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
                    </div>
                </div>
            </form>

            <!-- Validación de errores generales -->
            @if($errors->any())
            <div class="alert alert-danger alert-dismissible mt-3">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-ban"></i> Error!</h5>
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

        </div>
    </div>
</div>
@stop

@push('css')
<style>
    .login-page, .register-page {
        background: #e9ecef;
    }
    .login-box {
        width: 360px;
        margin: 7% auto;
    }
    @media (max-width: 576px) {
        .login-box {
            width: 90%;
            margin-top: 20px;
        }
    }
</style>
@endpush