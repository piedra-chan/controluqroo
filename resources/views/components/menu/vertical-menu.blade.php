<div class="sidebar-wrapper sidebar-theme">
   <nav id="sidebar">
      <div class="navbar-nav theme-brand flex-row  text-center">
         <div class="nav-logo">
            <div class="nav-item theme-logo">
               <a href="/cork/laravel/collapsible-menu/dashboard/analytics">
               <img src="{{Vite::asset('resources/images/logo_uaqroo.png')}}" class="navbar-logo logo-dark" alt="logo">
               <img src="{{Vite::asset('resources/images/logo_uaqroo.png')}}" class="navbar-logo logo-light" alt="logo">
               </a>
            </div>
            <div class="nav-item theme-text">
               <a href="/cork/laravel/collapsible-menu/dashboard/analytics" class="nav-link"> SCA-U </a>
            </div>
         </div>
         <div class="nav-item sidebar-toggle">
            <div class="btn-toggle sidebarCollapse">
               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-left">
                  <polyline points="11 17 6 12 11 7"></polyline>
                  <polyline points="18 17 13 12 18 7"></polyline>
               </svg>
            </div>
         </div>
      </div>
      @if (!Request::is('collapsible-menu/*'))                                                                                                                                                                                                                                                                                                                                                         
      <div class="profile-info">
         <div class="user-info">
            <div class="profile-img">
               <img src="{{Vite::asset('resources/images/user.png')}}" alt="avatar">
            </div>
            <div class="profile-content">
               <h6 class="">{{ Auth::user()->nombre_usuario }}</h6>
               <p class="">{{ Auth::user()->email }}</p>
            </div>
         </div>
      </div>
      @endif
      <div class="shadow-bottom"></div>
      <ul class="list-unstyled menu-categories" id="accordionExample">
      <li class="menu ">
            <a href="/principal" aria-expanded="false" class="dropdown-toggle">
               <div class="">
               <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M21.5315 11.5857L20.75 10.9605V21.25H22C22.4142 21.25 22.75 21.5858 22.75 22C22.75 22.4143 22.4142 22.75 22 22.75H2.00003C1.58581 22.75 1.25003 22.4143 1.25003 22C1.25003 21.5858 1.58581 21.25 2.00003 21.25H3.25003V10.9605L2.46855 11.5857C2.1451 11.8445 1.67313 11.792 1.41438 11.4686C1.15562 11.1451 1.20806 10.6731 1.53151 10.4144L9.65742 3.91366C11.027 2.818 12.9731 2.818 14.3426 3.91366L22.4685 10.4144C22.792 10.6731 22.8444 11.1451 22.5857 11.4686C22.3269 11.792 21.855 11.8445 21.5315 11.5857ZM12 6.75004C10.4812 6.75004 9.25003 7.98126 9.25003 9.50004C9.25003 11.0188 10.4812 12.25 12 12.25C13.5188 12.25 14.75 11.0188 14.75 9.50004C14.75 7.98126 13.5188 6.75004 12 6.75004ZM13.7459 13.3116C13.2871 13.25 12.7143 13.25 12.0494 13.25H11.9507C11.2858 13.25 10.7129 13.25 10.2542 13.3116C9.76255 13.3777 9.29128 13.5268 8.90904 13.9091C8.52679 14.2913 8.37773 14.7626 8.31163 15.2542C8.24996 15.7129 8.24999 16.2858 8.25003 16.9507L8.25003 21.25H9.75003H14.25H15.75L15.75 16.9507L15.75 16.8271C15.7498 16.2146 15.7462 15.6843 15.6884 15.2542C15.6223 14.7626 15.4733 14.2913 15.091 13.9091C14.7088 13.5268 14.2375 13.3777 13.7459 13.3116Z" fill="currentColor"/>
<g opacity="0.5">
<path fill-rule="evenodd" clip-rule="evenodd" d="M10.75 9.5C10.75 8.80964 11.3096 8.25 12 8.25C12.6904 8.25 13.25 8.80964 13.25 9.5C13.25 10.1904 12.6904 10.75 12 10.75C11.3096 10.75 10.75 10.1904 10.75 9.5Z" fill="currentColor"/>
<path fill-rule="evenodd" clip-rule="evenodd" d="M10.75 9.5C10.75 8.80964 11.3096 8.25 12 8.25C12.6904 8.25 13.25 8.80964 13.25 9.5C13.25 10.1904 12.6904 10.75 12 10.75C11.3096 10.75 10.75 10.1904 10.75 9.5Z" fill="currentColor"/>
</g>
<path opacity="0.5" d="M12.0494 13.25C12.7142 13.25 13.2871 13.2499 13.7458 13.3116C14.2375 13.3777 14.7087 13.5268 15.091 13.909C15.4732 14.2913 15.6223 14.7625 15.6884 15.2542C15.7462 15.6842 15.7498 16.2146 15.75 16.827L15.75 21.25H8.25L8.25 16.9506C8.24997 16.2858 8.24993 15.7129 8.31161 15.2542C8.37771 14.7625 8.52677 14.2913 8.90901 13.909C9.29126 13.5268 9.76252 13.3777 10.2542 13.3116C10.7129 13.2499 11.2858 13.25 11.9506 13.25H12.0494Z" fill="currentColor"/>
<path opacity="0.5" d="M16 3H18.5C18.7761 3 19 3.22386 19 3.5L19 7.63955L15.5 4.83955V3.5C15.5 3.22386 15.7239 3 16 3Z" fill="currentColor"/>
</svg>
                  <span>Dashboard</span>
               </div>
            </a>
         </li>
         <li class="menu ">
            <a href="/ver-users" aria-expanded="false" class="dropdown-toggle">
               <div class="">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path d="M15.5 7.5C15.5 9.433 13.933 11 12 11C10.067 11 8.5 9.433 8.5 7.5C8.5 5.567 10.067 4 12 4C13.933 4 15.5 5.567 15.5 7.5Z" fill="currentColor"/>
                     <path opacity="0.4" d="M19.5 7.5C19.5 8.88071 18.3807 10 17 10C15.6193 10 14.5 8.88071 14.5 7.5C14.5 6.11929 15.6193 5 17 5C18.3807 5 19.5 6.11929 19.5 7.5Z" fill="currentColor"/>
                     <path opacity="0.4" d="M4.5 7.5C4.5 8.88071 5.61929 10 7 10C8.38071 10 9.5 8.88071 9.5 7.5C9.5 6.11929 8.38071 5 7 5C5.61929 5 4.5 6.11929 4.5 7.5Z" fill="currentColor"/>
                     <path d="M18 16.5C18 18.433 15.3137 20 12 20C8.68629 20 6 18.433 6 16.5C6 14.567 8.68629 13 12 13C15.3137 13 18 14.567 18 16.5Z" fill="currentColor"/>
                     <path opacity="0.4" d="M22 16.5C22 17.8807 20.2091 19 18 19C15.7909 19 14 17.8807 14 16.5C14 15.1193 15.7909 14 18 14C20.2091 14 22 15.1193 22 16.5Z" fill="currentColor"/>
                     <path opacity="0.4" d="M2 16.5C2 17.8807 3.79086 19 6 19C8.20914 19 10 17.8807 10 16.5C10 15.1193 8.20914 14 6 14C3.79086 14 2 15.1193 2 16.5Z" fill="currentColor"/>
                  </svg>
                  <span>Usuarios</span>
               </div>
            </a>
         </li>
         <li class="menu ">
            <a href="/ver-areas" aria-expanded="false" class="dropdown-toggle">
               <div class="">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path fill-rule="evenodd" clip-rule="evenodd" d="M10.75 2H12.75C14.6356 2 15.5784 2 16.1642 2.58579C16.75 3.17157 16.75 4.11438 16.75 6V21.25H21.25H21.75C22.1642 21.25 22.5 21.5858 22.5 22C22.5 22.4142 22.1642 22.75 21.75 22.75H1.75C1.33579 22.75 1 22.4142 1 22C1 21.5858 1.33579 21.25 1.75 21.25H5.25H6.75V6C6.75 4.11438 6.75 3.17157 7.33579 2.58579C7.92157 2 8.86438 2 10.75 2ZM9 12C9 11.5858 9.33579 11.25 9.75 11.25H13.75C14.1642 11.25 14.5 11.5858 14.5 12C14.5 12.4142 14.1642 12.75 13.75 12.75H9.75C9.33579 12.75 9 12.4142 9 12ZM9 15C9 14.5858 9.33579 14.25 9.75 14.25H13.75C14.1642 14.25 14.5 14.5858 14.5 15C14.5 15.4142 14.1642 15.75 13.75 15.75H9.75C9.33579 15.75 9 15.4142 9 15ZM11.75 18.25C12.1642 18.25 12.5 18.5858 12.5 19V21.25H11V19C11 18.5858 11.3358 18.25 11.75 18.25ZM9.25 7C9.25 5.48122 10.4812 4.25 12 4.25C13.5188 4.25 14.75 5.48122 14.75 7C14.75 8.51878 13.5188 9.75 12 9.75C10.4812 9.75 9.25 8.51878 9.25 7Z" fill="currentColor"/>
                     <path opacity="0.6" d="M10.75 7C10.75 6.30964 11.3096 5.75 12 5.75C12.6904 5.75 13.25 6.30964 13.25 7C13.25 7.69036 12.6904 8.25 12 8.25C11.3096 8.25 10.75 7.69036 10.75 7Z" fill="currentColor"/>
                     <path opacity="0.6" d="M20.9129 5.88881C21.25 6.39325 21.25 7.09549 21.25 8.49995V21.2499H21.75C22.1642 21.2499 22.5 21.5857 22.5 21.9999C22.5 22.4142 22.1642 22.7499 21.75 22.7499H1.75C1.33579 22.7499 1 22.4142 1 21.9999C1 21.5857 1.33579 21.2499 1.75 21.2499H2.25V8.49995C2.25 7.09549 2.25 6.39325 2.58706 5.88881C2.73298 5.67043 2.92048 5.48293 3.13886 5.33701C3.58008 5.04219 5.67561 5.00524 6.75702 5.00061C6.75291 5.292 6.75294 5.59649 6.75298 5.91045L6.75299 5.99995V7.24995H4.25C3.83579 7.24995 3.5 7.58573 3.5 7.99995C3.5 8.41416 3.83579 8.74995 4.25 8.74995H6.75299V10.2499H4.25C3.83579 10.2499 3.5 10.5857 3.5 10.9999C3.5 11.4142 3.83579 11.7499 4.25 11.7499H6.75299V13.2499H4.25C3.83579 13.2499 3.5 13.5857 3.5 13.9999C3.5 14.4142 3.83579 14.7499 4.25 14.7499H6.75299V21.2499H16.7529V14.7499H19.25C19.6642 14.7499 20 14.4142 20 13.9999C20 13.5857 19.6642 13.2499 19.25 13.2499H16.7529V11.7499H19.25C19.6642 11.7499 20 11.4142 20 10.9999C20 10.5857 19.6642 10.2499 19.25 10.2499H16.7529V8.74995H19.25C19.6642 8.74995 20 8.41416 20 7.99995C20 7.58573 19.6642 7.24995 19.25 7.24995H16.7529V5.99995L16.7529 5.91046V5.91043C16.753 5.59648 16.753 5.292 16.7489 5.00061C17.8303 5.00524 19.9199 5.04219 20.3611 5.33701C20.5795 5.48293 20.767 5.67043 20.9129 5.88881Z" fill="currentColor"/>
                  </svg>
                  <span>Áreas</span>
               </div>
            </a>
         </li>
         <li class="menu ">
            <a href="/user-info" aria-expanded="false" class="dropdown-toggle">
               <div class="">
               <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">

<g id="SVGRepo_bgCarrier" stroke-width="0"/>

<g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>

<g id="SVGRepo_iconCarrier"> <circle cx="12" cy="6" r="4" fill="currentColor"/> <ellipse opacity="0.5" cx="12" cy="17" rx="7" ry="4" fill="currentColor"/> </g>

</svg>
                  <span>Mi Información</span>
               </div>
            </a>
         </li>
         <li class="menu ">
            <a href="/historial" aria-expanded="false" class="dropdown-toggle">
               <div class="">
               <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path opacity="0.5" d="M21 15.9983V9.99826C21 7.16983 21 5.75562 20.1213 4.87694C19.3529 4.10856 18.175 4.01211 16 4H8C5.82497 4.01211 4.64706 4.10856 3.87868 4.87694C3 5.75562 3 7.16983 3 9.99826V15.9983C3 18.8267 3 20.2409 3.87868 21.1196C4.75736 21.9983 6.17157 21.9983 9 21.9983H15C17.8284 21.9983 19.2426 21.9983 20.1213 21.1196C21 20.2409 21 18.8267 21 15.9983Z" fill="currentColor"/>
<path d="M8 3.5C8 2.67157 8.67157 2 9.5 2H14.5C15.3284 2 16 2.67157 16 3.5V4.5C16 5.32843 15.3284 6 14.5 6H9.5C8.67157 6 8 5.32843 8 4.5V3.5Z" fill="currentColor"/>
<path fill-rule="evenodd" clip-rule="evenodd" d="M6.25 10.5C6.25 10.0858 6.58579 9.75 7 9.75H7.5C7.91421 9.75 8.25 10.0858 8.25 10.5C8.25 10.9142 7.91421 11.25 7.5 11.25H7C6.58579 11.25 6.25 10.9142 6.25 10.5ZM9.75 10.5C9.75 10.0858 10.0858 9.75 10.5 9.75H17C17.4142 9.75 17.75 10.0858 17.75 10.5C17.75 10.9142 17.4142 11.25 17 11.25H10.5C10.0858 11.25 9.75 10.9142 9.75 10.5ZM6.25 14C6.25 13.5858 6.58579 13.25 7 13.25H7.5C7.91421 13.25 8.25 13.5858 8.25 14C8.25 14.4142 7.91421 14.75 7.5 14.75H7C6.58579 14.75 6.25 14.4142 6.25 14ZM9.75 14C9.75 13.5858 10.0858 13.25 10.5 13.25H17C17.4142 13.25 17.75 13.5858 17.75 14C17.75 14.4142 17.4142 14.75 17 14.75H10.5C10.0858 14.75 9.75 14.4142 9.75 14ZM6.25 17.5C6.25 17.0858 6.58579 16.75 7 16.75H7.5C7.91421 16.75 8.25 17.0858 8.25 17.5C8.25 17.9142 7.91421 18.25 7.5 18.25H7C6.58579 18.25 6.25 17.9142 6.25 17.5ZM9.75 17.5C9.75 17.0858 10.0858 16.75 10.5 16.75H17C17.4142 16.75 17.75 17.0858 17.75 17.5C17.75 17.9142 17.4142 18.25 17 18.25H10.5C10.0858 18.25 9.75 17.9142 9.75 17.5Z" fill="currentColor"/>
</svg>
                  <span>Historial de accesos</span>
               </div>
            </a>
         </li>
      </ul>
   </nav>
</div>
<script>
   document.addEventListener('DOMContentLoaded', function () {
       const menuItems = document.querySelectorAll('.menu');
   
       menuItems.forEach(item => {
       item.querySelector('a').addEventListener('click', function () {
           menuItems.forEach(i => i.classList.remove('active'));
           item.classList.add('active');
       });
   
       if (window.location.pathname === item.querySelector('a').getAttribute('href')) {
           item.classList.add('active');
       }
       });
   });
</script>