@component('mail::message')
# Bienvenido, {{ $nombreUsuario }}

Tu cuenta ha sido creada exitosamente. Aquí están tus credenciales de acceso:

**Correo:** {{ $correo }}  
**Contraseña temporal:** {{ $password }}

> Por seguridad, te recomendamos cambiar tu contraseña al iniciar sesión por primera vez.

@component('mail::button', ['url' => url('/login')])
Iniciar Sesión
@endcomponent

Gracias,  
{{ config('app.name') }}
@endcomponent