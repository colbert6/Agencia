<div class="row">
    <div class="col-md-10">
        <div class="box-body table-responsive">
            <table  id="tab" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Origen</th>
                        <th>Destino</th>
                        <th>Precio base</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach (@$ruta->result() as $datos) {    ?>
                        <tr>
                            <td><?= $datos->rut_id; ?></td>
                            <td><?= $datos->rut_origen; ?></td> 
                            <td><?= $datos->rut_destino; ?></td> 
                            <td><?= $datos->rut_precio_base; ?></td> 
                            <td>
                                <a href=<?php echo base_url()."index.php/ruta/editar/".$datos->rut_id; ?> class="btn  btn-minier"><i class="fa fa-pencil"></i></a>
                                <a href=<?php echo base_url()."index.php/ruta/eliminar/".$datos->rut_id; ?> class="btn  btn-minier"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="btn-group">
                    <a class="btn btn-primary" href="<?= base_url();?>index.php/ruta/nuevo" class="k-button">Nuevo</a>
            </div>
        </div>
    </div>   
</div>  
                
