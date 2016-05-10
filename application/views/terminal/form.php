<?php 
if(isset ($terminal))  {  $datos=$terminal->row(); }  
?>
 
<div class="col-md-6">
    <div class="box box-warning">
        <div class="box-header">
        </div>
        <form role="form" action="<?= base_url()."index.php/".$action ?>" method="post">
            <input name="guardar" id="guardar" type="hidden" value="1">
            <div class="box-body">
                <?php if(isset ($terminal)) {?>  
                   
                    <div class="form-group">
                        <label for="descripcion">Identificador</label>
                        <input type="text" required class="form-control" id="id" name="id" placeholder="Ingrese descripcion" readonly="readonly"
                           value=<?= $datos->ter_id; ?>>
                    </div>

                <?php } ?>  
                <div class="form-group">
                    <label for="sel1">Seleccione Empresa</label>
                    <select class="form-control" id="empresa">
                        <option value="0">--seleccione--</option>
                        <option value="1">Civa</option>
                        <option value="2">Movil Tours</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripcion</label>
                    <input type="text" required class="form-control" id="descripcion" name="descripcion" placeholder="Ingrese descripcion"
                        value="<?php if(isset ($terminal)) echo $datos->ter_descripcion; ?>" >
                </div>
                <div class="form-group">
                    <label for="abreviacion">Dirección</label>
                    <input type="text" required class="form-control" id="direccion" name="direccion" placeholder="Ingrese direccion"
                        value="<?php if(isset ($terminal)) echo $datos->ter_direccion ?>" >
                </div>
                <div class="form-group">
                    <label for="abreviacion">Ciudad</label>
                    <input type="text" required class="form-control" id="ciudad" name="ciudad" placeholder="Ingrese ciudad"
                        value="<?php if(isset ($terminal)) echo $datos->ter_ciudad ?>" >
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>