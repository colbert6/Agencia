<?php 
if(isset ($vehiculo))  {  $datos=$vehiculo->row(); }  
?>
 
<div class="col-md-6">
    <div class="box box-warning">
        <div class="box-header">
        </div>
        <form role="form" action="<?= base_url()."index.php/".$action ?>" method="post">
            <input name="guardar" id="guardar" type="hidden" value="1">
            <div class="box-body">
                <?php if(isset ($vehiculo)) {?>  
                   
                    <div class="form-group">
                        <label for="descripcion">Identificador</label>
                        <input type="text" required class="form-control" id="id" name="id" placeholder="Ingrese descripcion" readonly="readonly"
                           value=<?= $datos->veh_id; ?>>
                    </div>

                <?php } ?>
                <div class="form-group">
                    <label for="sel1">Seleccione Empresa</label>
                    <select class="form-control" id="empresa" name="empresa">
                        <option value="0">--seleccione--</option>
                        <option value="1">Civa</option>
                        <option value="2">Movil Tours</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="descripcion">Tipo</label>
                    <input type="text" required class="form-control" id="tipo" name="tipo" placeholder="Ingrese tipo"
                        value="<?php if(isset ($vehiculo)) echo $datos->veh_tipo; ?>" >
                </div> 
                <div class="form-group">
                    <label for="descripcion">Descripcion</label>
                    <input type="text" required class="form-control" id="descripcion" name="descripcion" placeholder="Ingrese descripcion"
                        value="<?php if(isset ($vehiculo)) echo $datos->veh_descripcion; ?>" >
                </div>
                <div class="form-group">
                    <label for="descripcion">Matricula</label>
                    <input type="text" required class="form-control" id="matricula" name="matricula" placeholder="Ingrese matricula"
                        value="<?php if(isset ($vehiculo)) echo $datos->veh_matricula; ?>" >
                </div>
                <div class="form-group">
                    <label for="abreviacion">Fecha Compra</label>
                    <input type="date" required class="form-control" id="fecha_compra" name="fecha_compra" placeholder="Ingrese fecha_compra"
                        value="<?php if(isset ($vehiculo)) echo $datos->veh_fecha_compra ?>" >
                </div>
                <div class="form-group">
                    <label for="abreviacion">Numero de Asientos</label>
                    <input type="text" required class="form-control" id="num_asientos" name="num_asientos" placeholder="Ingrese fecha num_asientos"
                        value="<?php if(isset ($vehiculo)) echo $datos->veh_num_asientos ?>" >
                </div>
                <div class="box-fooveh">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>