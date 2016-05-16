<style type="text/css">
td.editar-data {
    background: url("../img/edit.png") no-repeat center center;
    cursor: pointer;
}
td.eliminar-data {
    background: url("../img/eliminar.png") no-repeat center center;
    cursor: pointer;
}
</style>
<div class="row">
    <div class="col-md-10">
        <div class="box-body table-responsive">
            <table  id="tab" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Descripcion</th>
                        <th>Estado</th>
                        <th colspan="2">Acciones</th>
                    </tr>
                </thead>  
            </table>
            <div class="btn-group">
                    <a class="btn btn-primary k-button" id="nuevo_modal" data-toggle="modal" data-target="#modal_form"><i class="fa  fa-plus"></i> Nuevo</a>
            </div>
        </div>
    </div>   
</div>

<div class="modal fade" id="modal_form" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-users"></i> Nuevo Cargo</h4>
            </div>
            <form role="form" action="<?= base_url();?>cargo/guardar" method="post">
                <input name="guardar" id="guardar" type="hidden" value="1">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="descripcion">Identificador</label>
                        <input type="text" class="form-control" id="id" name="id" readonly="readonly" >
                    </div>  
                    <div class="form-group">
                        <label for="descripcion">Descripcion</label>
                        <input type="text" required class="form-control" id="descripcion" name="descripcion" placeholder="Ingrese descripcion" >
                    </div>
                    <div class="box-foorut">
                        <button type="button" id='submit_form'class="btn btn-primary">Guardar</button>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cerrar</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->                
