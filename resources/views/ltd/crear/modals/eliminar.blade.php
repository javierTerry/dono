<!-- delete Modal-->
            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
               <div class="modal-dialog" role="document">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">¿Segur@ de borrar el Rol?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                        </button>
                     </div>
                     <div class="modal-body">Confirma con el botón "eliminar".</div>
                     <div class="modal-footer">
                        <button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>
                        <form method="POST" action="">
                           @method('DELETE')
                           @csrf
                           {{-- <input type="text" id="rol_id" name="rol_id" value=""> --}}
                           <a class="btn btn-primary" onclick="$(this).closest('form').submit();">Eliminar</a>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
            <!-- delete Modal-->