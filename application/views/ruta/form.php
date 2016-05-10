<?php 
if(isset ($ruta))  {  $datos=$ruta->row(); }  
?>
 
<div class="col-md-6">
    <div class="box box-warning">
        <div class="box-header">
        </div>
        <form role="form" action="<?= base_url()."index.php/".$action ?>" method="post">
            <input name="guardar" id="guardar" type="hidden" value="1">
            <div class="box-body">
                <?php if(isset ($ruta)) {?>  
                   
                    <div class="form-group">
                        <label for="descripcion">Identificador</label>
                        <input type="text" required class="form-control" id="id" name="id" placeholder="Ingrese descripcion" readonly="readonly"
                           value=<?= $datos->rut_id; ?>>
                    </div>

                <?php } ?>  
                <div class="form-group">
                    <label for="descripcion">Origen</label>
                    <input type="text" required class="form-control" id="origen" name="origen" placeholder="Ingrese origen"
                        value="<?php if(isset ($ruta)) echo $datos->rut_origen; ?>" >
                </div>
                <div class="form-group">
                    <label for="abreviacion">Destino</label>
                    <input type="text" required class="form-control" id="destino" name="destino" placeholder="Ingrese destino"
                        value="<?php if(isset ($ruta)) echo $datos->rut_destino ?>" >
                </div>
                <div class="form-group">
                    <label for="abreviacion">Precio base</label>
                    <input type="text" required class="form-control" id="precio" name="precio" placeholder="Ingrese precio"
                        value="<?php if(isset ($ruta)) echo $datos->rut_precio_base ?>" >
                </div>
                <div class="box-foorut">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>