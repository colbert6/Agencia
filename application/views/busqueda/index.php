<div class="row">
	<div class="col-md-10">
		<div class="box-body table-responsive">
			<table  id="tab" class="table table-bordered table-striped">
			    <thead>
			        <tr>
			        	<th>Fecha</th>			        	
			            <th>Nombre</th>
			            <th>Dni</th>
			            <th>Empresa</th>			            
			            <th>Origen</th>
			            <th>Destino</th>
			            <th>Asiento</th>
			        </tr>
			    </thead>
			    <tbody>
			        <?php foreach (@$busqueda['civa'] as $datos) {	?>
			            <tr>
			            	<td><?= $datos->via_fecha_salida; ?></td> 
			            	<td><?= $datos->pas_nombres." ".$datos->pas_apellidos; ?></td> 
			                <td><?= $datos->pas_num_documento; ?></td>
			                <td><?= $datos->empresa; ?></td>			                			                
			                <td><?= $datos->ori; ?></td> 
			                <td><?= $datos->dest; ?></td> 
			                <td><?= $datos->asi_num; ?></td> 
			                
			            </tr>
			        <?php } ?>
			        <?php foreach (@$busqueda['movil'] as $datos) {	?>
			            <tr>
			                <td><?= $datos->via_fecha_salida; ?></td> 
			            	<td><?= $datos->pas_nombres." ".$datos->pas_apellidos; ?></td> 
			                <td><?= $datos->pas_num_documento; ?></td>
			                <td><?= $datos->empresa; ?></td>			                			                
			                <td><?= $datos->ori; ?></td> 
			                <td><?= $datos->dest; ?></td> 
			                <td><?= $datos->asi_num; ?></td> 
			                
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
 				
