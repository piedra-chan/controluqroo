<x-base-layout :scrollspy="false">

    <x-slot:pageTitle>
        {{$area->nombre}} 
    </x-slot>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <x-slot:headerFiles>
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
    </x-slot>
    <!-- END GLOBAL MANDATORY STYLES -->
    
    <div class="row layout-top-spacing">

        <!-- Sales -->
        
        <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
     <!--   {!! $chart->container() !!} -->
     <div class="widget widget-chart-one">

     <div class="widget-heading">
        <h5 class=""> Accesos diarios de la semana actual de {{ $area->nombre }}</h5>

    </div>
     <div class="widget-content">
     {!! $chart->container() !!}
    </div>
         </div>
         </div>
 
        <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">

            
<div class="widget widget-chart-two">
    <div class="widget-heading">
        <h5 class="">Distribución de accesos por género</h5>
        <p>Semana actual<p>
        <br>
        <p>Total de accesos : {{ $accesos['Total'] }}</p>
       <h5><img src="{{Vite::asset('resources/images/male.png')}}" alt="avatar" style="width: 50px; height: 50px;">{{ $accesos['Hombres'] }}</h5>
       <h5><img src="{{Vite::asset('resources/images/female_1.png')}}" alt="avatar" style="width: 50px; height: 50px;">{{ $accesos['Mujeres'] }}</h5>
       <h5><img src="{{Vite::asset('resources/images/other_gender.png')}}" alt="avatar" style="width: 50px; height: 50px;">{{ $accesos['Otro'] }}</h5>
    </div>
    <div class="widget-content">
        <div>     {!! $chart2->container() !!}
        </div>
    </div>
</div>

        </div>

        
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
        <div class="widget widget-table-two">
    
    <div class="widget-heading">
        <h5 class=""></h5>
    </div>

    <div class="widget-content">
    <button type="button" class="btn btn-primary mb-2 mr-2" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg> Permitir Acceso a nuevos usuarios
        </button>
        <div class="table-responsive">
        <table id="zero-config" class="table table-striped dt-table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>Matricula</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Fecha y hora de expiración</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users_acces as $u)
                        <tr>
                            <td>{{ $u->matricula }}</td>
                            <td>{{ $u->nombre }}</td>
                            <td>{{ $u->ape_materno . ' ' . $u->ape_paterno }}</td>
                            <td>{{ $u->expires_at }}</td>
                        </tr>
                    </tbody>
                        @endforeach                    
                    <tfoot>
                        <tr>
                        <th>Matricula</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Fecha y hora de expiración</th>
                        </tr>
                    </tfoot>
                </table>
        </div>
    </div>
</div>
        </div>
    

        
    </div>


    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Nuevos usuarios</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                      <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                    </button>
                </div>
                <div class="modal-body">
                    <h4 class="modal-heading mb-4 mt-2">Porfavor elija a los usuarios para conceder acceso</h4>
                    <div class="row mb-4">
                        <div class="form-group mb-4">
                            <form method="POST" action="{{ route('areas.acceso') }}">
                                @csrf
                                <label for="disabledTextInput">Usuarios:</label>
                                <select id="mi-select" name="usuarios[]" multiple="multiple" class="form-control" style="width: 100%;">
                                    @foreach($users_i as $user)
                                    <option value="{{ $user->usuario_id }}">{{ $user->nombre .' '. $user->ape_materno . ' ' . $user->ape_paterno }}</option>
                                    @endforeach
                                </select>
                                <br>
                                <div style="margin-bottom: 1em;"></div>
                                <label for="disabledTextInput">Expiracion:</label>
                                <input type="datetime-local" id="expires" name="expires" class="form-control">
                                
                                <input type="hidden" name="area" id="area" value ="{{ $area->area_id }}">
                        </div>
                    </div>
                    <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                    </form>
                                    <button class="btn btn-light-dark" data-bs-dismiss="modal">Descartar</button>
                                </div>
                </div>
            </div>
        </div>
    </div>



    
    <!--  BEGIN CUSTOM SCRIPTS FILE  -->
    <x-slot:footerFiles>
            {!! $chart->script() !!}

            {!! $chart2->script() !!}

            @vite(['resources/assets/js/custom.js'])
            <script src="{{asset('plugins/table/datatable/datatables.js')}}"></script>

            <script>
            $('#zero-config').DataTable({
                "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
            "<'table-responsive'tr>" +
            "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
                "oLanguage": {
                    "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                    "sInfo": "Mostrando páginas _PAGE_ of _PAGES_",
                    "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                    "sSearchPlaceholder": "Buscar..",
                   "sLengthMenu": "Resultados :  _MENU_",
                },
                "stripeClasses": [],
                "lengthMenu": [7, 10, 20, 50],
                "pageLength": 10 
            });
        </script>


            <script type="text/javascript">
        $(document).ready(function() {
            $('#mi-select').select2({
                placeholder: "Selecciona una o más opciones",
                allowClear: true,
                dropdownParent: $('#exampleModalCenter') // Asegura que el dropdown se renderice dentro del modal
            });
        });
    </script>

    <!-- Script para el uso de sweet alert por medio del
        evento success del controlador AreaController -->

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


        <script src="{{asset('plugins/apex/apexcharts.min.js')}}"></script>

        {{-- Sales --}}
        @vite(['resources/assets/js/widgets/_wTwo.js'])
        @vite(['resources/assets/js/widgets/_wOne.js'])
        @vite(['resources/assets/js/widgets/_wChartOne.js'])
        @vite(['resources/assets/js/widgets/_wChartTwo.js'])
        @vite(['resources/assets/js/widgets/_wActivityFour.js'])
        @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])



        <script src="{{asset('plugins/editors/quill/quill.js')}}"></script>
        <script src="{{asset('plugins/filepond/filepond.min.js')}}"></script>
        <script src="{{asset('plugins/filepond/FilePondPluginFileValidateType.min.js')}}"></script>
        <script src="{{asset('plugins/filepond/FilePondPluginImageExifOrientation.min.js')}}"></script>
        <script src="{{asset('plugins/filepond/FilePondPluginImagePreview.min.js')}}"></script>
        <script src="{{asset('plugins/filepond/FilePondPluginImageCrop.min.js')}}"></script>
        <script src="{{asset('plugins/filepond/FilePondPluginImageResize.min.js')}}"></script>
        <script src="{{asset('plugins/filepond/FilePondPluginImageTransform.min.js')}}"></script>
        <script src="{{asset('plugins/filepond/filepondPluginFileValidateSize.min.js')}}"></script>

    </x-slot>
    <!--  END CUSTOM SCRIPTS FILE  -->
</x-base-layout>