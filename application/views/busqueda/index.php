<div class="row">
	<div class="col-md-10">
		<div class="box-body table-responsive">
			<table  id="tab" class="table table-bordered table-striped">
			    <thead>
			        <tr>
			        	<th>Empresa</th>	
			        	<th>Fecha de Viaje</th>			        			            
			            <th>Origen</th>
			            <th>Destino</th>			        	
			            <th>Asiento</th>
			            <th>Dni</th>
			            <th>Pasajero</th>
			            <th>Viaje</th>	
			        </tr>
			    </thead>
			    <tbody>
			        <?php foreach (@$busqueda['civa'] as $datos) {	?>
			            <tr>
			            	<td><?= $datos->empresa; ?></td>
			            	<td><?= $datos->via_fecha_salida; ?></td>			            			                			                
			                <td><?= $datos->origen; ?></td> 
			                <td><?= $datos->destino; ?></td>  			                	
			                <td><?= $datos->asi_num; ?></td> 			                
			                <td><?= $datos->pas_dni; ?></td>
			            	<td><?= $datos->pas_nombre; ?></td>
			            	<th><a href="<?= base_url().'viaje/mas_detalle/'.$datos->via_id;?>">
			            			<i class="fa fa-arrow-circle-o-left"></i>
								</a>
							</th> 
			                
			            </tr>
			        <?php } ?>

			        <?php foreach (@$busqueda['movil'] as $datos) {	?>
			            <tr>
			            	<td><?= $datos->empresa; ?></td>
			            	<td><?= $datos->via_fecha_salida; ?></td>			            			                			                
			                <td><?= $datos->origen; ?></td> 
			                <td><?= $datos->destino; ?></td>  			                	
			                <td><?= $datos->asi_num; ?></td> 			                
			                <td><?= $datos->pas_dni; ?></td>
			            	<td><?= $datos->pas_nombre; ?></td> 
			                
			            </tr>
			        <?php } ?>
			       
			    </tbody>
			</table>
		</div>
 	</div>	 
</div>	
 				
