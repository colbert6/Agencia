<div class="row">
    <div class="col-md-10">
        <div class="box-body table-responsive">
            <table  id="tab" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Empresa</th>
                        <th>Id</th>
                        <th>Descripcion</th>
                        <th>Matricula</th>
                        <th>Numero Asientos</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach (@$vehiculo as $datos) {    ?>
                        <tr>
                            <td><?= $datos->empresa; ?></td>
                            <td><?= $datos->veh_id; ?></td>
                            <td><?= $datos->veh_descripcion; ?></td> 
                            <td><?= $datos->veh_matricula; ?></td> 
                            <td><?= $datos->veh_num_asientos; ?></td> 
                            <td>
                                <a href=<?php echo base_url()."index.php/vehiculo/editar/".$datos->veh_id; ?> class="btn  btn-minier"><i class="fa fa-pencil"></i></a>
                                <a href=<?php echo base_url()."index.php/vehiculo/eliminar/".$datos->veh_id; ?> class="btn  btn-minier"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="btn-group">
                    <a class="btn btn-primary" href="<?= base_url();?>index.php/vehiculo/nuevo" class="k-button">Nuevo</a>
            </div>
        </div>
    </div>   
</div>  
                
