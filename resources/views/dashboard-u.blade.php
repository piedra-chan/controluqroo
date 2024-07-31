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
<!--
// v0 by Vercel.
// https://v0.dev/t/lj3sdK7hCG3
-->

<div class="bg-light rounded-lg border p-4 w-100 max-w-75 mx-auto">
  <div class="d-flex flex-column flex-md-row align-items-center justify-content-between mb-4">
    <div class="d-flex align-items-center gap-2">
      <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center text-white" style="width: 64px; height: 64px; font-size: 1.5rem;">JD</div>
      <div>
        <h1 class="h4 fw-bold">John Doe</h1>
        <p class="text-secondary">Student</p>
      </div>
    </div>
    <div class="d-flex align-items-center gap-2">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="bi bi-calendar text-secondary">
        <path d="M8 2v4"></path>
        <path d="M16 2v4"></path>
        <rect width="18" height="18" x="3" y="4" rx="2"></rect>
        <path d="M3 10h18"></path>
      </svg>
      <p class="text-secondary">Último acceso: 2 hours ago</p>
    </div>
  </div>
  <div class="row row-cols-1 row-cols-md-2 g-4">
    <div>
      <h2 class="h5 fw-bold mb-3">Accesos recientes</h2>
      <div class="d-flex flex-column gap-3">
        <div class="d-flex align-items-center justify-content-between">
          <div>
            <p class="fw-medium">Library</p>
            <p class="text-secondary small">June 20, 2024 - 10:30 AM</p>
          </div>
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="bi bi-clock text-secondary">
            <line x1="2" x2="5" y1="12" y2="12"></line>
            <line x1="19" x2="22" y1="12" y2="12"></line>
            <line x1="12" x2="12" y1="2" y2="5"></line>
            <line x1="12" x2="12" y1="19" y2="22"></line>
            <circle cx="12" cy="12" r="7"></circle>
          </svg>
        </div>
        <div class="d-flex align-items-center justify-content-between">
          <div>
            <p class="fw-medium">Cafeteria</p>
            <p class="text-secondary small">June 19, 2024 - 12:45 PM</p>
          </div>
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="bi bi-clock text-secondary">
            <line x1="2" x2="5" y1="12" y2="12"></line>
            <line x1="19" x2="22" y1="12" y2="12"></line>
            <line x1="12" x2="12" y1="2" y2="5"></line>
            <line x1="12" x2="12" y1="19" y2="22"></line>
            <circle cx="12" cy="12" r="7"></circle>
          </svg>
        </div>
        <div class="d-flex align-items-center justify-content-between">
          <div>
            <p class="fw-medium">Gym</p>
            <p class="text-secondary small">June 18, 2024 - 4:20 PM</p>
          </div>
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="bi bi-clock text-secondary">
            <line x1="2" x2="5" y1="12" y2="12"></line>
            <line x1="19" x2="22" y1="12" y2="12"></line>
            <line x1="12" x2="12" y1="2" y2="5"></line>
            <line x1="12" x2="12" y1="19" y2="22"></line>
            <circle cx="12" cy="12" r="7"></circle>
          </svg>
        </div>
      </div>
    </div>
    <div>
      <h2 class="h5 fw-bold mb-3">Access Summary</h2>
      <div class="d-flex flex-column gap-3">
        <div class="d-flex align-items-center justify-content-between">
          <div>
            <p class="fw-medium">Library</p>
            <p class="text-secondary small">45 visits</p>
          </div>
          <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center text-white" style="width: 40px; height: 40px;">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="bi bi-book">
              <path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1 0-5H20"></path>
            </svg>
          </div>
        </div>
        <div class="d-flex align-items-center justify-content-between">
          <div>
            <p class="fw-medium">Cafeteria</p>
            <p class="text-secondary small">67 visits</p>
          </div>
          <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center text-white" style="width: 40px; height: 40px;">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="bi bi-cup">
              <path d="M3 2v7c0 1.1.9 2 2 2h4a2 2 0 0 0 2-2V2"></path>
              <path d="M7 2v20"></path>
              <path d="M21 15V2v0a5 5 0 0 0-5 5v6c0 1.1.9 2 2 2h3Zm0 0v7"></path>
            </svg>
          </div>
        </div>
        <div class="d-flex align-items-center justify-content-between">
          <div>
            <p class="fw-medium">Gym</p>
            <p class="text-secondary small">23 visits</p>
          </div>
          <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center text-white" style="width: 40px; height: 40px;">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="bi bi-scissors">
              <path d="M14.4 14.4 9.6 9.6"></path>
              <path d="M18.657 21.485a2 2 0 1 1-2.829-2.828l-1.767 1.768a2 2 0 1 1-2.829-2.829l6.364-6.364a2 2 0 1 1 2.829 2.829l-1.768 1.767a2 2 0 1 1 2.828 2.829z"></path>
              <path d="m21.5 21.5-1.4-1.4"></path>
              <path d="M3.9 3.9 2.5 2.5"></path>
              <path d="M6.404 12.768a2 2 0 1 1-2.829-2.829l1.768-1.767a2 2 0 1 1-2.829-2.829l6.364 6.364a2 2 0 1 1-2.829 2.829l-1.768-1.768a2 2 0 1 1 2.829 2.829z"></path>
              <path d="m2.5 2.5 1.4 1.4"></path>
            </svg>
          </div>
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