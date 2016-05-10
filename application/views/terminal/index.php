<div class="row">
	<div class="col-md-10">
		<div class="box-body table-responsive">
			<table  id="tab" class="table table-bordered table-striped">
			    <thead>
			        <tr>
			        	<th>Id</th>
			        	<th>Empresa</th>     
			            <th>Descripcion</th>
			            <th>Direccion</th>
			            <th>Ciudad</th>
			            <th>ACCIONES</th>
			        </tr>
			    </thead>
			    <tbody>
			        <?php foreach (@$terminal as $datos) {	?>
			            <tr>
			            	<td><?= $datos->ter_id; ?></td>
			            	<td><?= $datos->empresa; ?></td>
			                <td><?= $datos->ter_descripcion; ?></td> 
			                <td><?= $datos->ter_direccion; ?></td> 
			                <td><?= $datos->ter_ciudad; ?></td> 
			                <td>
			                    <a href=<?php echo base_url()."index.php/terminal/editar/".$datos->ter_id; ?> class="btn  btn-minier"><i class="fa fa-pencil"></i></a>
		                		<a href=<?php echo base_url()."index.php/terminal/eliminar/".$datos->ter_id; ?> class="btn  btn-minier"><i class="fa fa-trash-o"></i></a>
			                </td>
			            </tr>
			        <?php } ?>
			    </tbody>
			</table>
			<div class="btn-group">
			        <a class="btn btn-primary" href="<?= base_url();?>index.php/terminal/nuevo" class="k-button">Nuevo</a>
			</div>
		</div>
 	</div>	 
</div>	
 				
