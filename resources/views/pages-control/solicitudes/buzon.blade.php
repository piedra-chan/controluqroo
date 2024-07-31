<x-base-layout :scrollspy="true">

    <x-slot:pageTitle>
        Buzón 
    </x-slot>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <x-slot:headerFiles>
        <!--  BEGIN CUSTOM STYLE FILE  -->
   
    </x-slot>
    <!-- END GLOBAL MANDATORY STYLES -->

    <x-slot:scrollspyConfig>
        data-bs-spy="scroll" data-bs-target="#navSection" data-bs-offset="100"
    </x-slot>
    
    <div class="page-meta">
        <nav class="breadcrumb-style-one" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page"></li>
            </ol>
        </nav>
    </div>
    <!-- BREADCRUMB -->
    <div class="card">
  <div class="card-header">
    <h3 class="card-title">Buzón de solicitudes</h3>
    <p class="card-text text-muted">Puedes mirar y responder solicitudes</p>
  </div>
  <div class="card-body">
    <div class="list-group">
      <div class="list-group-item d-flex justify-content-between align-items-center">
        <div>
          <p class="mb-1 font-weight-bold" style="color: black;">John Doe</p>
          <small class="text-muted">Requested on July 25, 2024</small><br>
          <small class="text-muted">Requesting access to the marketing team's Figma files.</small>
        </div>
        <div class="btn-group">
          <a data-bs-toggle="modal" data-bs-target="#exampleModalCenter2" class="btn btn-info">Detalles</a>
          <button class="btn btn-danger">Reject</button>
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