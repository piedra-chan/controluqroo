<x-base-layout :scrollspy="true">

    <x-slot:pageTitle>
        Nueva solicitud 
    </x-slot>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <x-slot:headerFiles>
        <!--  BEGIN CUSTOM STYLE FILE  -->
        @vite(['resources/scss/light/assets/components/timeline.scss'])
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
            .toggle-code-snippet { margin-bottom: 0px; }
            body.dark .toggle-code-snippet { margin-bottom: 0px; }
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
                <li class="breadcrumb-item"><a href="#">Form</a></li>
                <li class="breadcrumb-item active" aria-current="page">Layouts</li>
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
    
    <div class="row">

        <div id="flHorizontalForm" class="col-lg-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">                                
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Horizontal form</h4>
                        </div>                                                                        
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <form>
                        <div class="row mb-3">
                          <label for="inputEmail2" class="col-sm-2 col-form-label">Mensaje</label>
                          <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputEmail2">
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label for="inputPassword2" class="col-sm-2 col-form-label">¿Hasta cuando?</label>
                          <div class="col-sm-10">
                            <input type="datetime-local" class="form-control" id="inputPassword2">
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label for="inputPassword2" class="col-sm-2 col-form-label">Usuarios para acceso</label>
                          <div class="col-sm-10">
                          <select id="mi-select" name="usuarios[]" multiple="multiple" class="form-control" style="width: 100%;">  
                                    <option value="">Hola</option>
                           </select>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label for="inputPassword2" class="col-sm-2 col-form-label">Área para acceso</label>
                          <div class="col-sm-10">
                            <input type="datetime-local" class="form-control" id="inputPassword2">
                          </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>

                </div>
            </div>
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

    </x-slot>
    <!--  END CUSTOM SCRIPTS FILE  -->
</x-base-layout>