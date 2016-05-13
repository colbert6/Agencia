<?php 
if(isset ($ciudad))  {  $datos=$ciudad->row(); }  
?>
 
<div class="col-md-6">
    <div class="box box-warning">
        <div class="box-header">
        </div>
        <form role="form" action="<?= base_url()."index.php/".$action ?>" method="post">
            <input name="guardar" id="guardar" type="hidden" value="1">
            <div class="box-body">
                <div class="form-group">
                    <label for="sel1">Seleccione Empresa</label>
                    <select class="form-control" id="empresa" name="empresa">
                        <option value="0">--seleccione--</option>
                        <option value="1">Civa</option>
                        <option value="2">Movil Tours</option>
                    </select>
                </div>
                <?php if(isset ($ciudad)) {?>  
                   
                    <div class="form-group">
                        <label for="descripcion">Identificador</label>
                        <input type="text" required class="form-control" id="id" name="id" placeholder="Ingrese descripcion" readonly="readonly"
                           value=<?= $datos->ciu_id; ?>>
                    </div>

                <?php } ?>  
                
                <div class="form-group">
                    <label for="descripcion">Codigo Postal</label>
                    <input type="text" required class="form-control" id="codigo" name="codigo" placeholder="Ingrese codigo"
                        value="<?php if(isset ($ciudad)) echo $datos->ciu_codigo_postal; ?>" >
                </div>
                <div class="form-group">
                    <label for="abreviacion">Nombre</label>
                    <input type="text" required class="form-control" id="nombre" name="nombre" placeholder="Ingrese nombre"
                        value="<?php if(isset ($ciudad)) echo $datos->ciu_nombre ?>" >
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>