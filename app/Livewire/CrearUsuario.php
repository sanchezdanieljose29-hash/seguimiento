<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class CrearUsuario extends Component
{
    use WithPagination;

    // Propiedades
    public $search = "";
    public int $NIS;
    public int $Tdoc;
    public string $Ndoc;
    public string $Nombres_Apellidos;
    public string $CorreoElectronico;

    // Mantener búsqueda en URL
    protected $queryString = ['search'];

    // Si vas a usar eventos, define el método
    protected $listeners = ['search-updated' => 'actualizarBusqueda'];

    /**
     * Se ejecuta ANTES de actualizar search
     * Ideal para resetear página
     */
    public function updatingSearch()
    {
        $this->resetPage();
    }

    /**
     * Método para el evento (opcional, si lo necesitas)
     */
    public function actualizarBusqueda($search)
    {
        $this->search = $search;
        $this->resetPage();
    }


    public function render()
    {
        // Optimización: Solo buscar si hay al menos 2 caracteres
        $users = User::query()
            ->when(strlen($this->search) >= 2, function ($query) {
                return $query->where(function ($q) {
                    $q->where('Ndoc', 'like', '%' . $this->search . '%')
                        ->orWhere('Nombres_Apellidos', 'like', '%' . $this->search . '%');
                });
            }, function ($query) {
                // Si búsqueda es muy corta, mostrar vacío o pocos resultados
                return $query->whereRaw('1 = 0'); // No muestra resultados
                // OPCIONAL: return $query->limit(5); // Muestra 5 resultados por defecto
            })
            ->orderBy('NIS')
            ->paginate(10);

        return view('livewire.crear-usuario', compact('users'));
    }
}
