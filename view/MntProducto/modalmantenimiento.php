<div id="modalmantenimiento" class="modal fade bd-example-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
        <form action="" method="post" id="producto_form">
            <div class="modal-header" >
                <h4 class="modal-title" id="mdltitulo"></h4>
            </div>
                    <div class="modal-body">
                        <input type="hidden" id="prod_id" name="prod_id">

                        <div class="form-group">
                        <label class="form-label" for="prod_nom">Nombre</label>
                        <input type="text"  class="form-control" name="prod_nom" id="prod_nom" placeholder="Ingrese el producto.." require />
                        </div>

                        <div class="form-group">
                        <label class="form-label" for="prod_nom">Descripción</label>
                        <textarea rows="3"  name="prod_desc" id="prod_desc" class="form-control" placeholder="Ingrese la descripción.." require></textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-rounded btn-default" data-dismiss="modal">Cerrar</button>

                    <button type="submit"  name="action" id="#" value="add" class="btn btn-rounded btn-primary" >Guardar</button>    
                    </div>
                </form>
            
        </div>
    </div>

</div>