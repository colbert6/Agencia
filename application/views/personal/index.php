<style type="text/css">
td.detail-control {
    background: url('../img/details_open.png') no-repeat center center;
    cursor: pointer;
}
tr.shown td.detail-control {
    background: url('../img/details_close.png') no-repeat center center;
}
td.editar-data {
    background: url("../../img/edit.png") no-repeat center center;
    cursor: pointer;
}
td.eliminar-data {
    background: url("../../img/eliminar.png") no-repeat center center;
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
                        <th>DNI</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
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
                <h4 class="modal-title"><i class="fa fa-users"></i> Nuevo personal</h4>
            </div>
            <form role="form" >
                <div class="modal-body">
                    <div class="form-group">
                        <label for="descripcion">Identificador</label>
                        <input type="text" class="form-control" id="id" name="id" readonly="readonly" >
                    </div>
                    <div class="form-group">
                        <label for="descripcion">DNI</label>
                        <input type="text" required class="form-control" id="dni" name="dni" placeholder="Ingrese dni" maxlength="8" onkeypress="return soloNumeros(event)">
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Nombre</label>
                        <input type="text" required class="form-control" id="nombre" name="nombre" placeholder="Ingrese nombre" onkeypress="return soloLetras(event)">
                    </div>
                    <div class="form-group">
                        <label for="capacidad">Apellidos</label>
                        <input type="text" required class="form-control" id="apellidos" name="apellidos" placeholder="Ingrese apellidos" onkeypress="return soloLetras(event)">
                    </div>
                    <div class="form-group">
                        <label for="capacidad">Fecha de Nacimiento</label>
                        <input type="date" required class="form-control" id="nacimiento" name="nacimiento" min="1" max="150" placeholder="Ingrese fecha nacimiento" >
                    </div>
                    <div class="form-group">
                        <label for="capacidad">Fecha de Registro</label>
                        <input type="date" required class="form-control" id="registro" name="registro" placeholder="Ingrese fecha registro" >
                    </div>
                    <div class="form-group">
                        <label for="capacidad">Cargo</label>
                        <input type="number" required class="form-control" id="cargo" name="cargo" min="1" max="150" placeholder="Ingrese cargo" onkeypress="return soloLetras(event)">
                    </div>
                </div>
                <div class="modal-footer clearfix">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
                    <button type="submit" id='submit_form' class="btn btn-primary pull-left"><i class="fa fa-check"></i> Guardar</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->                

<div class="modal fade" id="modal_delete" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class=""></i>Alerta eliminar </h4>
            </div>
            <form role="form" action="" method="post">
                <input type="hidden" id='id_dato_eliminar'></input>
               
                <div class="modal-body" >
                    <div class="alert alert-danger alert-dismissable">
                        <i class="fa fa-warning"></i>
                        <h4>Estas seguro que desea eliminar el dato?</h4><h4 id="desc_dato_eliminar"></h4>
                    </div>
                </div>
                <div class="modal-footer clearfix">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
                    <button type="submit" id="delete_click" class="btn btn-primary pull-left"><i class="fa fa-check"></i> Aceptar</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->                

