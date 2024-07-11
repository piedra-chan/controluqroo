<div class="modal fade" id="exampleModalCenter3{{ $a->area_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
<div class="modal-header">
   <h5 class="modal-title" id="exampleModalCenterTitle">Reporte de área</h5>
   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
      <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
         <line x1="18" y1="6" x2="6" y2="18"></line>
         <line x1="6" y1="6" x2="18" y2="18"></line>
      </svg>
   </button>
</div>
<div class="modal-body">
   <h4 class="modal-heading mb-4 mt-2">Porfavor elija fechas</h4>
   <div class="row mb-4">
      <div class="form-group mb-4">
         <form method="POST" action="/generar-reporte/{{ $a->area_id }}">
         @csrf
         @method('POST')
         <input type="hidden" value="{{ $a->area_id }}">
         <label for="disabledTextInput">Fecha de inicio</label>
         <input type="date" name="fecha_inicio" id="nombre" class="form-control" value="" placeholder="">
      </div>
      <div class="form-group mb-4">
         <label for="disabledTextInput">Fecha fin</label>
         <input type="date" name="fecha_fin" id="users"  class="form-control" value="" placeholder="">
      </div>
      <div class="form-group mb-4">
         <label for="disabledTextInput">Género de usuarios</label>
         <br>
         <select name="sexo" id="pet-select" class="form-control">
  <option value="">--Porfavor selecciona una opción--</option>
  <option value="hombres">Hombres</option>
  <option value="mujeres">Mujeres</option>
  <option value="todos">Todos</option>
</select>  
        </div>
   </div>
   <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Generar</button>
                                    </form>
                                    <button class="btn btn-light-dark" data-bs-dismiss="modal">Descartar</button>
                                </div>
</div>