<!--div class="row">
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
            </table>
            <div class="btn-group">
                    <a class="btn btn-primary k-button" id="nuevo_modal" data-toggle="modal" data-target="#modal_form"><i class="fa  fa-plus"></i> Nuevo</a>
            </div>
        </div>
    </div>   
</div-->

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
                    <?php 
                        
                        if(count($viaje->result()) <1){
                            echo "<td colspan='9'>NO SE ENCONTRARON VIAJES DISPONIBLES</td>";
                        }else {

                            foreach (@$viaje->result() as $datos) {  ?>
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
                                    <a href=<?php echo base_url()."viaje/mas_detalle/".$datos->via_id; ?> class="btn  btn-minier"><i class="fa fa-eye"></i></a>
                                    <a href=<?php echo base_url()."viaje/venta_pasaje?idviaje=".$datos->via_id."&tipobus=".$datos->veh_tipo?> class="btn  btn-minier"><i class="fa fa-shopping-cart"></i></a>
                                </td>
                            </tr>
                    <?php   } 

                        }
                    ?>
                </tbody>

                
            </table>
            <!--div class="btn-group">
                    <a class="btn btn-primary" href="<?= base_url();?>index.php/viaje/nuevo" class="k-button">Nuevo</a>
            </div-->
        </div>
    </div>   
</div>  
                
