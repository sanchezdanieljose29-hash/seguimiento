<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="p-4">
                <!-- Mensajes de éxito/error -->
                @if (session()->has('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                @if (session()->has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <!-- Buscador con icono -->
                <div class="mb-4">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-search"></i>
                            </span>
                        </div>
                        <input 
                            type="text" 
                            wire:model.live.debounce.300ms="search" 
                            placeholder="Buscar por NIS, nombres o apellidos..." 
                            class="form-control form-control-lg"
                        >
                    </div>
                </div>

                <!-- Tarjeta con la tabla -->
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-users mr-2"></i>
                            Usuarios y Roles
                        </h3>
                        <div class="card-tools">
                            <span class="badge badge-primary">{{ $usuarios->total() }} usuarios</span>
                        </div>
                    </div>
                    
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped table-bordered mb-0">
                                <thead class="bg-primary text-white">
                                    <tr>
                                        <th class="text-center" style="width: 80px">NIS</th>
                                        <th>Nombres y apellidos</th>
                                        <th style="width: 150px">Rol Actual</th>
                                        <th class="text-center" style="width: 120px">Cambiar Roles</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($usuarios as $item)
                                        <tr>
                                            <td class="text-center align-middle">{{ $item->NIS }}</td>
                                            <td class="align-middle">{{ $item->Nombres_Apellidos }}</td>
                                            <td class="align-middle">
                                                @if($item->role_name)
                                                    <span class="badge badge-primary badge-pill px-3 py-2">
                                                        <i class="fas fa-check-circle mr-1"></i>
                                                        {{ $item->role_name }}
                                                    </span>
                                                @else
                                                    <span class="badge badge-secondary badge-pill px-3 py-2">
                                                        <i class="fas fa-times-circle mr-1"></i>
                                                        Sin rol
                                                    </span>
                                                @endif
                                            </td>
                                            <td class="text-center align-middle">
                                                <button 
                                                    wire:click="edit({{ $item->NIS }})" 
                                                    class="btn btn-primary btn-sm"
                                                >
                                                    <i class="fas fa-edit mr-1"></i>
                                                    Editar
                                                </button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center py-4">
                                                <div class="text-muted">
                                                    <i class="fas fa-user-slash fa-3x mb-3"></i>
                                                    <p>No se encontraron usuarios</p>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card-footer clearfix">
                        <div class="float-right">
                            {{ $usuarios->links() }}
                        </div>
                    </div>
                </div>

                <!-- Modal de edición de roles -->
                @if($showEditModal)
                    <div class="modal fade show" id="editRoleModal" style="display: block; background-color: rgba(0,0,0,0.5);" tabindex="-1" role="dialog">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-primary text-white">
                                    <h5 class="modal-title">
                                        <i class="fas fa-user-tag mr-2"></i>
                                        Editar Rol de Usuario
                                    </h5>
                                    <button type="button" class="close text-white" wire:click="$set('showEditModal', false)">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                
                                <form wire:submit.prevent="update">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="info-box bg-light p-3 mb-4">
                                                    <div class="row w-100">
                                                        <div class="col-md-4">
                                                            <strong>NIS:</strong> {{ $userNIS }}
                                                        </div>
                                                        <div class="col-md-8">
                                                            <strong>Nombre Completo:</strong> {{ $userNombres_Apellidos }} 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="userRoleId" class="font-weight-bold">
                                                <i class="fas fa-tag mr-1"></i>
                                                Seleccionar Rol
                                            </label>
                                            <select 
                                                id="userRoleId"
                                                wire:model="userRoleId"
                                                class="form-control form-control-lg @error('userRoleId') is-invalid @enderror"
                                            >
                                                <option value="">-- Seleccione un rol --</option>
                                                @foreach($availableRoles as $role)
                                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('userRoleId') 
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" wire:click="$set('showEditModal', false)">
                                            <i class="fas fa-times mr-1"></i>
                                            Cancelar
                                        </button>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-save mr-1"></i>
                                            Guardar Cambios
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>