<?php
// resources/views/livewire/ver-eps.blade.php

use App\Models\Eps;
use Livewire\Component;

new class extends Component
{
    public $eps = [];
    
    public function mount()
    {
        $this->eps = Eps::all();
    }
    
    // El método render NO es necesario aquí
};

?>

<div class="form-group col-md-4">
    <label for="eps">EPS</label>
    <select id="eps" name="eps" class="form-control">
        <option value="" selected disabled>Selecciona la EPS a la que pertenece</option>
        
        @foreach($eps as $item)
            <option value="{{ $item->NIS }}">
                {{ $item->Denominacion }}
            </option>
        @endforeach
    </select>
</div>
