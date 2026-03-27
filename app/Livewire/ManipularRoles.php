<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class ManipularRoles extends Component
{
    use WithPagination;


    public $search = '';
    public $selectedUserId = null;
    public $showEditModal = false;
    public $selectedRoleId = null;
    // Propiedades para el usuario seleccionado
    public $userNIS = '';
    public $userNombres_Apellidos = '';
    public $userRoleId = '';

    // Lista de roles disponibles
    public $availableRoles = [];

    public function mount()
    {
        // Cargar roles disponibles
        $this->availableRoles = DB::table('roles')->get();
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function edit($nis)
    {
        // Obtener el usuario con su rol actual
        $usuario = DB::table('tblusuarios')
            ->leftJoin('model_has_roles', function ($join) {
                $join->on('tblusuarios.NIS', '=', 'model_has_roles.model_id')
                    ->where('model_has_roles.model_type', '=', 'App\Models\User');
            })
            ->leftJoin('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->where('tblusuarios.NIS', $nis)
            ->select(
                'tblusuarios.NIS',
                'tblusuarios.Nombres_Apellidos',
                'model_has_roles.role_id'
            )
            ->first();

        if ($usuario) {
            $this->selectedUserId = $usuario->NIS;
            $this->userNIS = $usuario->NIS;
            $this->userNombres_Apellidos = $usuario->Nombres_Apellidos;
            $this->userRoleId = $usuario->role_id ?? '';
            $this->showEditModal = true;
        }
    }

    public function update()
    {
        $this->validate([
            'userRoleId' => 'required|exists:roles,id',
        ]);

        try {
            DB::beginTransaction();

            // Verificar si ya existe
            $existing = DB::table('model_has_roles')
                ->where('model_id', $this->selectedUserId)
                ->where('model_type', 'App\Models\User')
                ->first();

            if ($existing) {
                // Actualizar
                DB::table('model_has_roles')
                    ->where('model_id', $this->selectedUserId)
                    ->where('model_type', 'App\Models\User')
                    ->update(['role_id' => $this->userRoleId]);
            } else {
                // Insertar
                DB::table('model_has_roles')->insert([
                    'role_id' => $this->userRoleId,
                    'model_type' => 'App\Models\User',
                    'model_id' => $this->selectedUserId
                ]);
            }

            DB::commit();

            $this->showEditModal = false;
            $this->reset(['selectedUserId', 'userNIS', 'userNombres_Apellidos', 'userRoleId']);
            session()->flash('message', 'Rol actualizado correctamente.');
        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('error', 'Error al actualizar: ' . $e->getMessage());
        }
    }

    public function render()
    {
        $usuarios = DB::table('tblusuarios')
            ->leftJoin('model_has_roles', function ($join) {
                $join->on('tblusuarios.NIS', '=', 'model_has_roles.model_id')
                    ->where('model_has_roles.model_type', '=', 'App\Models\User');
            })
            ->leftJoin('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->when($this->search, function ($query) {
                return $query->where(function ($q) {
                    $q->where('tblusuarios.Nombres_Apellidos', 'like', '%' . $this->search . '%')
                        ->orWhere('tblusuarios.NIS', 'like', '%' . $this->search . '%');
                });
            })
            ->select(
                'tblusuarios.NIS',
                'tblusuarios.Nombres_Apellidos',
                'roles.name as role_name',
                'model_has_roles.role_id'
            )
            ->orderBy('tblusuarios.Nombres_Apellidos')
            ->paginate(10);

        return view('livewire.manipular-roles', [
            'usuarios' => $usuarios
        ]);
    }
}
