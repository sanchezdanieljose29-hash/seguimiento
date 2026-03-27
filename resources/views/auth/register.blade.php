<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body class="bg-gray-100">
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl w-full bg-white rounded-lg shadow-xl p-8">
            <h2 class="text-3xl font-bold text-center text-gray-900 mb-8">
                Registro de Usuario
            </h2>

            @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
            @endif

            <form action="{{ route('register') }}" method="POST" class="space-y-6">
                @csrf

                {{-- Documento de identidad --}}
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label for="Tdoc" class="block text-sm font-medium text-gray-700">
                            Tipo de documento
                        </label>
                        <select name="Tdoc" id="Tdoc" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            <option value="">Seleccione...</option>
                            @foreach($tipodocumentos as $item)
                            <option value="{{ $item->NIS }}" {{ old('Tdoc') == $item->NIS ? 'selected' : '' }}>
                                {{ $item->Denominacion }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="md:col-span-2">
                        <label for="Ndoc" class="block text-sm font-medium text-gray-700">
                            Número de documento
                        </label>
                        <input type="text" name="Ndoc" id="Ndoc" required
                            value="{{ old('Ndoc') }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </div>
                </div>


                {{-- Nombres y Apellidos --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="Nombres" class="block text-sm font-medium text-gray-700">
                            Nombres
                        </label>
                        <input type="text" name="Nombres" id="Nombres" required
                            value="{{ old('Nombres') }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </div>

                    <div>
                        <label for="Apellidos" class="block text-sm font-medium text-gray-700">
                            Apellidos
                        </label>
                        <input type="text" name="Apellidos" id="Apellidos" required
                            value="{{ old('Apellidos') }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </div>
                </div>

        </div>


    </div>

    <div class="flex items-center justify-between pt-4">
        <button type="submit"
            class="bg-indigo-600 text-white px-6 py-3 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-colors font-medium">
            <i class="fas fa-user-plus mr-2"></i>
            Registrarse
        </button>

        <a href="{{ route('login') }}" class="text-indigo-600 hover:text-indigo-800">
            ¿Ya tienes cuenta? Inicia sesión
        </a>
    </div>
    </form>
    </div>
    </div>
</body>

</html>