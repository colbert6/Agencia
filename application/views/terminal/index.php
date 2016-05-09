<div class="row">
	<div class="col-md-10">
		<div class="box-body table-responsive">
			<table  id="tab" class="table table-bordered table-striped">
			    <thead>
			        <tr>
			            <th>Id</th>
			            <th>Descripcion</th>
			            <th>Direccion</th>
			            <th>Acciones</th>
			        </tr>
			    </thead>
			    <tbody>
			        <?php foreach (@$terminal->result() as $datos) {	?>
			            <tr>
			                <td><?= $datos->ter_id; ?></td>
			                <td><?= $datos->ter_descripcion; ?></td> 
			                <td><?= $datos->ter_direccion; ?></td> 
			                <td><?= $datos->ter_ciudad; ?></td> 
			                <td><?= $datos->ter_estado; ?></td> 
			                <td>
			                    <a href=<?php echo base_url()."index.php/terminal/editar/".$datos->raz_id; ?> class="btn  btn-minier"><i class="fa fa-pencil"></i></a>
		                		<a href=<?php echo base_url()."index.php/terminal/eliminar/".$datos->raz_id; ?> class="btn  btn-minier"><i class="fa fa-trash-o"></i></a>
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
 				
