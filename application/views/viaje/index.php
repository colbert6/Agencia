<div class="row">
    <div class="col-md-10">
        <div class="box-body table-responsive">
            <table  id="tab" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Origen </th>
                        <th>Destino </th>
                        <th>Tipo Veh</th>
                        <th>Vehiculo</th>
                        <th>Precio Base</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach (@$viaje->result() as $datos) {  ?>
                        <tr>
                            <td><?= $datos->via_id; ?></td>
                            <td><?= $datos->via_fecha_salida ;  ?></td>
                            <td><?= $datos->via_hora_salida; ?></td>
                            <td><?= $datos->ori; ?></td>
                            <td><?= $datos->dest; ?></td> 
                            <td><?= $datos->veh_tipo; ?></td>
                            <td><?= $datos->veh_descripcion; ?></td>  
                            <td><?= $datos->via_precio; ?></td>  
                            <td>
                                <a href=<?php echo base_url()."viaje/editar/".$datos->via_id; ?> class="btn  btn-minier"><i class="fa fa-pencil"></i></a>
                                <a href=<?php echo base_url()."viaje/eliminar/".$datos->via_id; ?> class="btn  btn-minier"><i class="fa fa-trash-o"></i></a>
                                <a href=<?php echo base_url()."viaje/venta_pasaje/".$datos->via_id."/".$datos->veh_tipo; ?> class="btn  btn-minier"><i class="fa fa-shopping-cart"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="btn-group">
                    <a class="btn btn-primary" href="<?= base_url();?>index.php/viaje/nuevo" class="k-button">Nuevo</a>
            </div>
        </div>
    </div>   
</div>  
                
