<div class="container-fluid">
    <br>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title">
                        <i class="fas fa-users"></i> Registro Múltiple de Usuarios
                    </h3>
                </div>

                <div class="card-body">
                    @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                    @endif

                    @if (session()->has('error'))
                    <div class="alert alert-danger">
                        {!! session('error') !!}
                    </div>
                    @endif

                    <form wire:submit.prevent="guardarMultiplesUsuarios">

                        {{-- ✅ Variable renombrada a $item --}}
                        @foreach($items as $index => $item)
                        <div class="card mb-3" wire:key="usuario-{{ $index }}-{{ count($items) }}">
                            <div class="card-header bg-light">
                                <strong>Usuario {{ $index + 1 }}</strong>
                                @if(count($items) > 1)
                                <button type="button"
                                    wire:click="eliminarUsuario({{ $index }})"
                                    class="btn btn-danger btn-sm float-end">
                                    <i class="fas fa-trash"></i> Eliminar
                                </button>
                                @endif
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    {{-- Tipo de documento --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Tipo de documento *</label>
                                        <select wire:model="items.{{ $index }}.Tdoc"
                                            class="form-control @error('items.'.$index.'.Tdoc') is-invalid @enderror">
                                            <option value="">-- Seleccione --</option>
                                            <option value="1">Cédula</option>
                                            <option value="2">Tarjeta de Identidad</option>
                                            <option value="3">Cédula de Extranjería</option>
                                        </select>
                                        @error('items.'.$index.'.Tdoc')
                                        <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    {{-- Número de documento --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Número de documento *</label>
                                        <input type="text"
                                            wire:model="items.{{ $index }}.Ndoc"
                                            class="form-control @error('items.'.$index.'.Ndoc') is-invalid @enderror"
                                            placeholder="Ingrese número de documento">
                                        @error('items.'.$index.'.Ndoc')
                                        <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    {{-- Nombre completo --}}
                                    {{-- ✅ wire:model corregido --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Nombre completo *</label>
                                        <input type="text"
                                            wire:model="items.{{ $index }}.Nombres_Apellidos"
                                            class="form-control @error('items.'.$index.'.Nombres_Apellidos') is-invalid @enderror"
                                            placeholder="Ingrese nombre completo">
                                        @error('items.'.$index.'.Nombres_Apellidos')
                                        <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    {{-- Correo --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Correo Electrónico *</label>
                                        <input type="email"
                                            wire:model="items.{{ $index }}.CorreoElectronico"
                                            class="form-control @error('items.'.$index.'.CorreoElectronico') is-invalid @enderror"
                                            placeholder="correo@ejemplo.com">
                                        @error('items.'.$index.'.CorreoElectronico')
                                        <span class="text-danger small">{{ $message }}</span>
                                        @enderror

                                    </div>
                                    {{-- Roles --}}
                                    <div class="col-md-6 mb-3">
                                        <select wire:model="items.{{ $index }}.rol" class="form-control">
                                            <option value="aprendiz">Aprendiz</option>
                                            <option value="instructor">Instructor</option>
                                            <option value="admin">Administrador</option>
                                        </select>
                                        @error('items.'.$index.'.Rol')
                                        <span class="text-danger small">{{ $message }}</span>
                                        @enderror

                                        @endforeach {{-- ✅ Cierra correctamente antes de los botones --}}

                                        {{-- Botones de acción --}}
                                        <div class="row mt-3">
                                            <div class="col-12">
                                                <button type="button"
                                                    wire:click="agregarFormulario"
                                                    class="btn btn-secondary">
                                                    <i class="fas fa-plus"></i> Agregar otro usuario
                                                </button>
                                                <button type="submit" class="btn btn-primary float-end">
                                                    <i class="fas fa-save"></i> Guardar
                                                </button>
                                            </div>
                                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>