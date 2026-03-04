@if(session('success'))
<div class="alert alert-success alert-dismissible fade show">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif
<h2>Login de usuarios</h2>
<form action="{{ route('login') }}" method="POST">

    <label for="tbltiposdocumentos_NIS">Tipo de documento</label>
   <select name="tbltiposdocumentos_NIS" id="tbltiposdocumentos_NIS">
   <option value="1">Cédula de ciudadania</option>
   <option value="2">Tarjeta de identidad</option>
   <option value="3">Cédula de extrajería</option>
   </select>
    <br><br>

    <label for="Ndoc"> Número de documento</label>
    <input type="text" name="Ndoc" required>
    <br><br>

    <label for="password">Contraseña</label>
    <input type="password" name="password" required>
    <br><br>
    <button type="submit" class="btn 
mt-4">Iniciar sesión</button>

    <!-- Validación de errores  --->
    @if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif

</form>