<x-base-layout :scrollspy="false">

    <x-slot:pageTitle>
        Login
    </x-slot>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <x-slot:headerFiles>
        <!--  BEGIN CUSTOM STYLE FILE  
        @vite(['resources/scss/light/assets/authentication/auth-boxed.scss'])
        @vite(['resources/scss/dark/assets/authentication/auth-boxed.scss'])
         END CUSTOM STYLE FILE  -->
         @vite('resources/css/login.css')

         <style>
             .background-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* Oscurece la imagen */
        }
        body {
            /* Establece la imagen de fondo */
            background-image: url('{{ Vite::asset("resources/images/EDIFICIO.jpg") }}');

            /* Ajusta la configuración de la imagen de fondo */
            background-size: cover; /* Cubre toda el área del contenedor */
            background-position: center; /* Centra la imagen */
            background-repeat: no-repeat; /* No se repite la imagen */
        }
        h2 {
            font-family: Arial, sans-serif; 
    font-size: 24px; /* Tamaño de fuente */
    font-weight: bold; /* Peso de la fuente */
    color: #333; /* Color del texto */
    letter-spacing: 1px; /* Espaciado entre letras */
    margin-bottom: 10px; /* Margen inferior */
  }
        </style>


    </x-slot>
    <!-- END GLOBAL MANDATORY STYLES -->
    
    <body>
        
	<!-- Main Content -->
	<div class="container-fluid">
		<div class="row main-content bg-success text-center">
			<div class="col-md-4 text-center company__info">
				<span class="company__logo"><h2><span class="fa fa-android"></span></h2></span>
                <img src="{{Vite::asset('resources/images/logo_uaqroo.png')}}" alt="" class="img-fluid">
			</div>
			<div class="col-md-8 col-xs-12 col-sm-12 login_form ">
				<div class="container-fluid">
					<div class="row">
                        <br>
						<h2>Log in</h2>
					</div>
					<div class="row">
                    <form method="POST" action="{{ route('login') }}" class="form-group">
        @csrf
							<div class="row">
								<input type="text" name="email" :value="old('email')" id="username" class="form__input" placeholder="Correo">
							</div>
							<div class="row">
								<!-- <span class="fa fa-lock"></span> -->
								<input type="password" name="password" id="password" class="form__input" placeholder="Contraseña">
							</div>
                            <div class="row">
            <div class="col text-right">
        <input type="submit" value="Ingresar" class="btn">
    </div>
</div>

						</form>
					</div>
					<div class="row">
						<p>¿No tienes cuenta? <a href="#">Registrate aquí</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>
    
    <!--  BEGIN CUSTOM SCRIPTS FILE  -->
    <x-slot:footerFiles>

    </x-slot>
    <!--  END CUSTOM SCRIPTS FILE  -->
</x-base-layout>