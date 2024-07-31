<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" type="image/x-icon" href="{{Vite::asset('resources/images/favicon.ico')}}"/>
    @vite(['resources/css/login.css'])
</head>
<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form method="POST" action="{{ route('login') }}" class="sign-in-form">
                @csrf
                    <h2 class="title">Iniciar Sesión</h2>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
            <x-text-input id="email" class="block mt-1 w-full" placeholder="Correo" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            placeholder="Contraseña"
                            required autocomplete="current-password" />

                  <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    <input type="submit" value="Login" class="btn solid">
                </form>

                <!-- Formulario de registro -->
                <form action="#" class="sign-up-form">
                    <h2 class="title">Registro</h2>
                    <div class="input-field">
                      <i class="fas fa-user"></i>
                      <input type="text" placeholder="Nombre" />
                    </div>
                    <div class="input-field">
                      <i class="fas fa-user"></i>
                      <input type="text" placeholder="Apellido materno" />
                    </div>
                    <div class="input-field">
                      <i class="fas fa-user"></i>
                      <input type="text" placeholder="Apellido paterno" />
                    </div>                   
                    <div class="input-field">
                    <i class="fa-solid fa-book"></i>
                    <select name="pets" id="pet-select">
  <option value="">--Género--</option>
  <option value="M">Hombre</option>
  <option value="F">Mujer</option>
  <option value="OTRO">Prefiero no contestar</option>
</select>                    
</div>
                    <div class="input-field">
                      <i class="fas fa-envelope"></i>
                      <input type="email" placeholder="Correo" />
                    </div>
                    <div class="input-field">
                      <i class="fas fa-lock"></i>
                      <input type="password" placeholder="Contraseña" />
                    </div>
                    <input type="submit" class="btn" value="Registrar" />
                  </form>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>¿Nuevo aquí?</h3>
                    <p>Puedes registrarte aquí</p>
                        <button class="btn transparent" id="sign-up-btn">Registro</button>
                </div>

                <img src="{{Vite::asset('resources/images/log.svg')}}" class="image" alt="log">
            </div>

            <div class="panel right-panel">
                <div class="content">
                    <h3>¿Ya tienes cuenta?</h3>
                    <p>Inicia sesión aquí</p>
                        <button class="btn transparent" id="sign-in-btn">Iniciar sesión</button>
                </div>

                <img src="{{Vite::asset('resources/images/register.svg')}}" class="image" alt="log">
            </div>
        </div>
    </div>

    @vite(['resources/js/login.js'])

</body>
</html>