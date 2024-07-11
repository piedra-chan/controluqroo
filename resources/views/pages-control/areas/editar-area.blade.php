<div class="modal fade" id="exampleModalCenter2{{ $a->area_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">Editar área</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                      <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <h4 class="modal-heading mb-4 mt-2">Porfavor complete el formulario</h4>
<div class="row mb-4">
<div class="form-group mb-4">
    <form method="POST" action="/editar-area/{{ $a->area_id }}">
    @csrf
    @method('PUT')
<input type="hidden" value="{{ $a->area_id }}">
<label for="disabledTextInput">Nombre del área</label>
<input type="text" name="nombreedit" id="nombre" class="form-control" value="{{ $a->nombre }}" placeholder="Nombre">
</div>
<div class="form-group mb-4">
<label for="disabledTextInput">Usuarios permitidos</label>
<input type="text" name="usersedit" id="users"  class="form-control" value="{{ $a->usuarios_permitidos }}" placeholder="Usuarios permitidos">
</div>
<div class="form-group mb-4">
<label for="disabledTextInput">Descripción</label>
<input type="text" name="descripcionedit" class="form-control" value="{{ $a->descripcion }}" placeholder="Descripción">
</div>
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