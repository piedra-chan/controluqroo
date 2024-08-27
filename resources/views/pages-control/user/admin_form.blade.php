<x-base-layout :scrollspy="true">

    <x-slot:pageTitle>
        Nuevo administrador
    </x-slot>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <x-slot:headerFiles>
        <!--  BEGIN CUSTOM STYLE FILE  -->
        @vite(['resources/scss/light/assets/components/timeline.scss'])
        @vite(['resources/css/form.css'])
                <!--  BEGIN CUSTOM STYLE FILE  -->
                <link rel="stylesheet" href="{{asset('plugins/apex/apexcharts.css')}}">

@vite(['resources/scss/light/assets/components/list-group.scss'])
@vite(['resources/scss/light/assets/widgets/modules-widgets.scss'])

@vite(['resources/scss/dark/assets/components/list-group.scss'])
@vite(['resources/scss/dark/assets/widgets/modules-widgets.scss'])
<!-- Estilos del sweet alert-->
@vite(['resources/css/sweet.css'])

<link rel="stylesheet" href="{{asset('plugins/table/datatable/datatables.css')}}">
@vite(['resources/scss/light/plugins/table/datatable/dt-global_style.scss'])
@vite(['resources/scss/dark/plugins/table/datatable/dt-global_style.scss'])

@vite(['resources/scss/light/assets/components/carousel.scss'])
@vite(['resources/scss/light/assets/components/modal.scss'])
@vite(['resources/scss/light/assets/components/tabs.scss'])
@vite(['resources/scss/dark/assets/components/carousel.scss'])
@vite(['resources/scss/dark/assets/components/modal.scss'])
@vite(['resources/scss/dark/assets/components/tabs.scss'])
    <!-- Incluir jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Incluir Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<!-- Incluir Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- Librería de Sweet Alert 2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <!--  END CUSTOM STYLE FILE  -->
        
        <style>

        </style>
    </x-slot>
    <!-- END GLOBAL MANDATORY STYLES -->

    <x-slot:scrollspyConfig>
        data-bs-spy="scroll" data-bs-target="#navSection" data-bs-offset="100"
    </x-slot>
    
    <!-- BREADCRUMB -->
    <div class="page-meta">
        <nav class="breadcrumb-style-one" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"></li>
                <li class="breadcrumb-item active" aria-current="page"></li>
            </ol>
        </nav>
    </div>
    <!-- /BREADCRUMB -->

    <div id="navSection" data-bs-spy="affix" class="nav  sidenav">
        <div class="sidenav-content">
            <a href="#flStackForm" class="active nav-link">Utilities</a>
            <a href="#flHorizontalForm" class="nav-link">Horizontal form</a>
            <a href="#flHorizontalFormlabel" class="nav-link">Horizontal form label</a>
            <a href="#flLoginForm" class="nav-link">Gutter</a>
            <a href="#flFormsGrid" class="nav-link">Form Grid</a>
            <a href="#flAutoSizing" class="nav-link">Auto-sizing</a>
            <a href="#flInlineForm" class="nav-link">Inline Forms</a>
        </div>
    </div>
    


    <div class="card shadow-sm w-100 mx-auto">
  <div class="card-header">
    <h3 class="h5">Nuevo administrador</h3>
    <p class="text-muted small">Llena todos los campos porfavor.</p>
  </div>
  <div class="card-body">
    <div class="row">
    </div>
    <form method="POST" action="{{ route('user.admin') }}">
    @csrf
    <div class="container">
  <div class="row">
    <div class="col-12 col-md-6">
      <label class="form-label" for="nombre">Nombre</label>
      <input type="text" class="form-control" id="nombre" name="nombre">
    </div>
    <div class="col-12 col-md-6">
      <label class="form-label" for="apeMaterno">Apellido Materno</label>
      <input type="text" class="form-control" id="apeMaterno" name="apeMaterno">
    </div>
    <div class="col-md-6">
      <label class="form-label" for="apePaterno">Apellido Paterno</label>
      <input type="text" class="form-control" id="apePaterno" name="apePaterno">
    </div>
    <div class="col-md-6">
      <label class="form-label" for="genero">Género</label>
      <select class="form-select" id="genero" name="genero">
        <option value="">-- Género --</option>
        <option value="M">Masculino</option>
        <option value="F">Femenino</option>
        <option value="Otro">Otro</option>
      </select>
    </div>
    <div class="col-md-6">
      <label class="form-label" for="correo">Correo Electrónico</label>
      <input type="email" class="form-control" id="correo" name="correo">
    </div>
    <div class="col-md-6">
      <label class="form-label" for="contrasena">Contraseña</label>
      <input type="password" class="form-control" id="contrasena" name="contrasena">
    </div>
  </div>
</div>

  <div class="card-footer text-end">
    <button type="submit" class="btn btn-primary">Enviar</button>
  </div>
</form>
</div>

    </div>

 
    </div>
    
    <!--  BEGIN CUSTOM SCRIPTS FILE  -->
    <x-slot:footerFiles>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#mi-select').select2({
                placeholder: "Selecciona una o más opciones",
                allowClear: true // Asegura que el dropdown se renderice dentro del modal
            });
        });
    </script>

@if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: '¡Éxito!',
                    text: '{{ session('success') }}',
                    icon: 'success',
                    confirmButtonText: 'Aceptar',
                     // Opcional: añadir configuración de customClass para aislar estilos
                     customClass: {
                        container: 'swal-container',
                        popup: 'swal-popup',
                        header: 'swal-header',
                        title: 'swal-title',
                        text: 'swal-text',
                        closeButton: 'swal-close-button',
                        icon: 'swal-icon',
                        image: 'swal-image',
                        content: 'swal-content',
                        input: 'swal-input',
                        actions: 'swal-actions',
                        confirmButton: 'swal-confirm-button',
                        cancelButton: 'swal-cancel-button',
                        footer: 'swal-footer'
                    }
                });
            });
        </script>
        @endif


    </x-slot>
    <!--  END CUSTOM SCRIPTS FILE  -->
</x-base-layout>