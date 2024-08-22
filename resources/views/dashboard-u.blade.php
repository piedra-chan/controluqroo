<x-base-layout :scrollspy="true">

    <x-slot:pageTitle>
        Mi Actividad 
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
<!--
// v0 by Vercel.
// https://v0.dev/t/lj3sdK7hCG3
-->
<div class="bg-currentColor rounded-3 border p-4 w-100 mw-75 mx-auto">
  <div class="d-flex flex-column flex-md-row align-items-center justify-content-between mb-4">
    <div class="d-flex align-items-center gap-2">
      <?php
        $first_name = substr(Auth::user()->persona->nombre, 0, 1);
        $last_name = substr(Auth::user()->persona->ape_materno, 0, 1);
       ?>
      <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center text-white" style="width: 64px; height: 64px; font-size: 1.5rem;">{{ $first_name . $last_name }}</div>
      <div>
        <h1 class="h4 fw-bold text-currentColor">{{ Auth::user()->persona->nombre .' '. Auth::user()->persona->ape_materno }}</h1>
        <p class="text-primary">{{ Auth::user()->role->rol }}</p>
      </div>
    </div>
    <div class="d-flex align-items-center gap-2">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="bi bi-calendar text-primary">
        <path d="M8 2v4"></path>
        <path d="M16 2v4"></path>
        <rect width="18" height="18" x="3" y="4" rx="2"></rect>
        <path d="M3 10h18"></path>
      </svg>
      <p class="text-primary">Último acceso: {{ $ultimoAccesoFormat }}</p>
    </div>
  </div>
  <div class="row row-cols-1 row-cols-md-2 g-4">
    <div>
      <h2 class="h5 fw-bold mb-3 text-currentColor">Accesos recientes</h2>
      <div class="d-flex flex-column gap-3">
        @foreach($areasFormateadas as $a)
        <div class="d-flex align-items-center justify-content-between">
          <div>
            <p class="fw-semibold text-currentColor">{{ $a->nombre }}</p>
            <p class="text-primary small">{{ $a->created_at }}</p>
          </div>
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="bi bi-clock text-primary">
            <line x1="2" x2="5" y1="12" y2="12"></line>
            <line x1="19" x2="22" y1="12" y2="12"></line>
            <line x1="12" x2="12" y1="2" y2="5"></line>
            <line x1="12" x2="12" y1="19" y2="22"></line>
            <circle cx="12" cy="12" r="7"></circle>
          </svg>
        </div>
        @endforeach
      </div>
    </div>
    <div>
      <h2 class="h5 fw-bold mb-3 text-currentColor">Visitas de áreas recientes por semana</h2>
      <div class="d-flex flex-column gap-3">
        @foreach($areasFormateadas as $a)
        <div class="d-flex align-items-center justify-content-between">
          <div>
            <p class="fw-semibold text-currentColor">{{ $a->nombre }}</p>
            <p class="text-primary small">Visitas: {{ $a->conteo }}</p>
          </div>
          <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center text-white" style="width: 40px; height: 40px;">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M7 5H11C12.8856 5 13.8284 5 14.4142 5.58579C15 6.17157 15 7.11438 15 9V21.25H16.5H21H22C22.4142 21.25 22.75 21.5858 22.75 22C22.75 22.4142 22.4142 22.75 22 22.75H2C1.58579 22.75 1.25 22.4142 1.25 22C1.25 21.5858 1.58579 21.25 2 21.25H3V9C3 7.11438 3 6.17157 3.58579 5.58579C4.17157 5 5.11438 5 7 5ZM5.25 8C5.25 7.58579 5.58579 7.25 6 7.25H12C12.4142 7.25 12.75 7.58579 12.75 8C12.75 8.41421 12.4142 8.75 12 8.75H6C5.58579 8.75 5.25 8.41421 5.25 8ZM5.25 11C5.25 10.5858 5.58579 10.25 6 10.25H12C12.4142 10.25 12.75 10.5858 12.75 11C12.75 11.4142 12.4142 11.75 12 11.75H6C5.58579 11.75 5.25 11.4142 5.25 11ZM5.25 14C5.25 13.5858 5.58579 13.25 6 13.25H12C12.4142 13.25 12.75 13.5858 12.75 14C12.75 14.4142 12.4142 14.75 12 14.75H6C5.58579 14.75 5.25 14.4142 5.25 14ZM9 18.25C9.41421 18.25 9.75 18.5858 9.75 19V21.25H8.25V19C8.25 18.5858 8.58579 18.25 9 18.25Z" fill="currentColor"/>
              <path opacity="0.5" d="M15 2H17C18.8856 2 19.8284 2 20.4142 2.58579C21 3.17157 21 4.11438 21 6V21.25H15V9C15 7.11438 15 6.17157 14.4142 5.58579C13.8416 5.01319 12.9279 5.0003 11.126 5.00001V3.49999C11.2103 3.11275 11.351 2.82059 11.5858 2.58579C12.1715 2 13.1144 2 15 2Z" fill="currentColor"/>
            </svg>
          </div>
        </div>
        @endforeach
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