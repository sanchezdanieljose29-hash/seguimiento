<?php

namespace App\Livewire;

use App\Mail\UsuarioCreadoMail;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class Create extends Component
{
    public $items = [];

    public function rules()
    {
        return [
            'items.*.Tdoc'              => 'required',
            'items.*.Ndoc'              => 'required|string|max:15',
            'items.*.Nombres_Apellidos' => 'required|string',
            'items.*.CorreoElectronico' => 'required|email|unique:tblusuarios,CorreoElectronico',
            'items.*.rol'               => 'required|in:aprendiz,instructor,admin',
        ];
    }

    protected $messages = [
        'items.*.Tdoc.required'              => 'Agregue el tipo de documento',
        'items.*.Ndoc.required'              => 'El número de documento es obligatorio',
        'items.*.Nombres_Apellidos.required' => 'El nombre y apellido es obligatorio',
        'items.*.CorreoElectronico.required' => 'El correo es obligatorio',
        'items.*.CorreoElectronico.email'    => 'Ingrese un correo válido',
        'items.*.CorreoElectronico.unique'   => 'Este email ya está registrado',
        'items.*.rol.required'               => 'Seleccione un rol',
        'items.*.rol.in'                     => 'El rol seleccionado no es válido',
    ];

    public function mount()
    {
        $this->items = [[
            'Tdoc'              => '',
            'Ndoc'              => '',
            'Nombres_Apellidos' => '',
            'CorreoElectronico' => '',
            'rol'               => 'aprendiz', // 👈 por defecto
        ]];
    }

    public function agregarFormulario()
    {
        $this->items[] = [
            'Tdoc'              => '',
            'Ndoc'              => '',
            'Nombres_Apellidos' => '',
            'CorreoElectronico' => '',
            'rol'               => 'aprendiz', // 👈 por defecto
        ];
    }

    public function eliminarUsuario($index)
    {
        unset($this->items[$index]);
        $this->items = array_values($this->items);
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function guardarMultiplesUsuarios()
    {
        $this->validate();

        try {
            DB::transaction(function () {
                foreach ($this->items as $usuarioData) {

                    $passwordPlano = $usuarioData['Ndoc'];
                    $rol           = $usuarioData['rol'] ?? 'aprendiz';

                    // 1️⃣ Crear usuario en tblusuarios
                    $usuario = User::create([
                        'Tdoc'              => $usuarioData['Tdoc'],
                        'Ndoc'              => $usuarioData['Ndoc'],
                        'Nombres_Apellidos' => $usuarioData['Nombres_Apellidos'],
                        'CorreoElectronico' => $usuarioData['CorreoElectronico'],
                        'password_cifrado'  => bcrypt($passwordPlano),
                    ]);

                    // 2️⃣ Asignar rol en model_has_roles con Spatie
                    $usuario->assignRole($rol);

                    // 3️⃣ Crear registro en tabla según el rol
                    if ($rol === 'aprendiz') {

                        DB::table('tblaprendices')->insert([
                            'Usuarios_NIS' => $usuario->NIS,
                            // El aprendiz completa el resto desde su perfil
                        ]);

                    } elseif ($rol === 'instructor') {

                        DB::table('tblinstructores')->insert([
                            'Usuarios_NIS' => $usuario->NIS,
                            // El instructor completa el resto desde su perfil
                        ]);

                    }
                    // admin no necesita registro en otras tablas

                    // 4️⃣ Enviar correo con credenciales
                    Mail::to($usuarioData['CorreoElectronico'])->send(
                        new UsuarioCreadoMail(
                            $usuarioData['Nombres_Apellidos'],
                            $usuarioData['CorreoElectronico'],
                            $passwordPlano
                        )
                    );
                }
            });

            session()->flash('success', 'Usuarios guardados y notificados por correo.');
            $this->mount();

        } catch (\Exception $e) {
            session()->flash('error', 'Error: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.create');
    }
}