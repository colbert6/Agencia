<?php
?>
<div class="row">
    <div class="col-md-10">
        <div class="box-body table-responsive">
        	<table  id="tab" class="table table-bordered table-striped">
	            <thead>
	                <tr>
	                    <?php
	                    foreach (array_keys($consulta->row_array()) as $value) {
	                            $nombre=ucwords(substr($value,4));
	                            echo "<th>$nombre</th>  "  ;   
	                        }
	                     ?>
	                </tr>
	            </thead>
	        </table>
            <input type="button" id="myBtn" value="Activar Función">
            <div class="btn-group">
                    <a class="btn btn-primary" href="<?= base_url();?>cargo/nuevo" class="k-button">Nuevo</a>
            </div>
        </div>
    </div>   
</div>  
                


       
