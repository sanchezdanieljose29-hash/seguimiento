<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            {{-- INPUT CORREGIDO - Solo una forma de actualizar --}}
                            <div class="position-relative">
                                <input
                                    type="text"
                                    wire:model.live.debounce.300ms="search"
                                    placeholder="Buscar por documento o nombre..."
                                    class="form-control">

                                {{-- Indicador de carga con delay para evitar pestañeo --}}
                                <div wire:loading.delay.shortest
                                    class="position-absolute top-50 end-0 translate-middle-y me-3">
                                    <div class="spinner-border spinner-border-sm text-primary" role="status">
                                        <span class="visually-hidden">Cargando...</span>
                                    </div>
                                </div>
                            </div>
                        </div>  
                    </div>
                </div>

                <div class="card-body p-0">
                    {{-- Tabla con transición suave --}}
                    <div wire:loading.delay.class="opacity-50"
                        class="transition-all duration-300">

                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>NIS</th>
                                    <th>Nombres y Apellidos</th>
                                    <th>Número de documento</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                {{-- IMPORTANTE: wire:key para evitar parpadeo --}}
                                <tr wire:key="user-{{ $user->NIS }}">
                                    <td>{{ $user->NIS }}</td>
                                    <td>{{ $user->Nombres_Apellidos }}</td>
                                    <td>{{ $user->Ndoc }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3" class="text-center py-4 text-muted">
                                        @if(strlen($search) >= 2)
                                        No se encontraron resultados para "{{ $search }}"
                                        @else
                                        Ingresa al menos 2 caracteres para buscar
                                        @endif
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card-footer clearfix">
                    {{-- Mostrar contador de resultados --}}
                    @if($users->total() > 0)
                    <div class="float-left">
                        Mostrando {{ $users->firstItem() }} - {{ $users->lastItem() }}
                        de {{ $users->total() }} resultados
                    </div>
                    @endif

                    {{-- Paginación --}}
                    <div class="float-right">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>