<?php 
if(isset ($cargo))  {  $datos=$cargo->row(); }  
?>
 
<div class="col-md-6">
    <div class="box box-warning">
        <div class="box-header">
        </div>
        <form role="form" action="<?= base_url()."index.php/".$action ?>" method="post">
            <input name="guardar" id="guardar" type="hidden" value="1">
            <div class="box-body">
                <?php if(isset ($cargo)) {?>  
                   
                    <div class="form-group">
                        <label for="descripcion">Identificador</label>
                        <input type="text" required class="form-control" id="id" name="id" placeholder="Ingrese descripcion" readonly="readonly"
                           value=<?= $datos->rut_id; ?>>
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
                        value="<?php if(isset ($cargo)) echo $datos->rut_descripcion; ?>" >
                </div>
                <div class="box-foorut">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>