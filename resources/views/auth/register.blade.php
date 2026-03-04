<h2>Registro de usuarios</h2>

<form action="{{ route('register') }}" method="POST">
    @csrf
    <label for="Nombres">Nombres</label>
    <input type="text" name="Nombres" id="Nombres" required
        value="{{ old('Nombres') }}">
    <br><br>
    <label for="Apellidos">Apellidos</label>
    <input type="text" name="Apellidos" id="Apellidos" required
        value="{{ old('Apellidos') }}">
    <br><br>
    <label for="tbltiposdocumentos_NIS">Tipo de documento</label>
    <select name="tbltiposdocumentos_NIS" id="tbltiposdocumentos_NIS" required>
        @foreach($tipodocumentos as $item)
        <option value="{{ $item->NIS }}">
            {{ $item->Denominacion }}
        </option>
        @endforeach
    </select>
    <br><br>
    <label for="Ndoc">Número de documento</label>
    <input type="text" name="Ndoc" required>
    <br><br>
    <label for="Direccion">Dirección</label>
    <input type="text" name="Direccion" required>
    <br><br>
    <label for="Telefono">Teléfono</label>
    <input type="text" name="Telefono" required>
    <br><br>
    <label for="CorreoInstitucional">Correo institucional</label>
    <input type="email" name="CorreoInstitucional" required>
    <br><br>
    <label for="CorreoPersonal">Correo personal</label>
    <input type="email" name="CorreoPersonal" required>
    <br><br>
    <label for="Sexo">Sexo</label>
    <select type="number" name="Sexo" id="Sexo" required>
        <option value="1">Masculino</option>
        <option value="0">Femenino</option>
    </select>
    <br><br>
    <label for="FechaNac">Fecha de nacimiento</label>
    <input type="date" name="FechaNac" required>
    <br><br>
    <label for="tbleps_NIS">EPS</label>
    <select name="tbleps_NIS" id="tbleps_NIS" required>
        @foreach($eps as $item)
        <option value="{{ $item->NIS }}">
            {{ $item->Denominacion }}
        </option>
        @endforeach
    </select>
    <br><br>

    <button type="submit" class="btn 
mt-4">Registrarse</button>

    <!-- Validación de errores  --->

</form>