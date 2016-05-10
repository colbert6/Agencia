<?php 
if(isset ($personal))  {  $datos=$personal->row(); }  
?>
 
<div class="col-md-6">
    <div class="box box-warning">
        <div class="box-header">
        </div>
        <form role="form" action="<?= base_url()."index.php/".$action ?>" method="post">
            <input name="guardar" id="guardar" type="hidden" value="1">
            <div class="box-body">
                <?php if(isset ($personal)) {?>  
                   
                    <div class="form-group">
                        <label for="descripcion">Identificador</label>
                        <input type="text" required class="form-control" id="id" name="id" placeholder="Ingrese descripcion" readonly="readonly"
                           value=<?= $datos->per_id; ?>>
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
                    <label for="descripcion">DNI</label>
                    <input type="text" required class="form-control" id="dni" name="dni" placeholder="Ingrese dni"
                        value="<?php if(isset ($personal)) echo $datos->per_dni; ?>" >
                </div> 
                <div class="form-group">
                    <label for="descripcion">Nombres</label>
                    <input type="text" required class="form-control" id="nombres" name="nombres" placeholder="Ingrese nombres"
                        value="<?php if(isset ($personal)) echo $datos->per_nombres; ?>" >
                </div>
                <div class="form-group">
                    <label for="descripcion">Apellidos</label>
                    <input type="text" required class="form-control" id="apellidos" name="apellidos" placeholder="Ingrese apellidos"
                        value="<?php if(isset ($personal)) echo $datos->per_apellidos; ?>" >
                </div>
                <div class="form-group">
                    <label for="abreviacion">Fecha Nacimiento</label>
                    <input type="date" required class="form-control" id="fecha_nac" name="fecha_nac" placeholder="Ingrese fecha_nac"
                        value="<?php if(isset ($personal)) echo $datos->per_fecha_nac ?>" >
                </div>
                <div class="form-group">
                    <label for="abreviacion">Fecha Registro</label>
                    <input type="date" required class="form-control" id="registro" name="registro" placeholder="Ingrese fecha registro"
                        value="<?php if(isset ($personal)) echo $datos->per_fecha_reg ?>" >
                </div>
                <div class="form-group">
                    <label for="abreviacion">Cargo</label>
                    <input type="text" required class="form-control" id="cargo" name="cargo" placeholder="Ingrese fecha cargo"
                        value="<?php if(isset ($personal)) echo $datos->per_cargo ?>" >
                </div>
                <div class="box-fooper">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>