<div class="row">
    <div class="col-md-10">
        <div class="box-body table-responsive">
            <table  id="tab" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Descripcion</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach (@$cargo->result() as $datos) {    ?>
                        <tr>
                            <td><?= $datos->car_id; ?></td>
                            <td><?= $datos->car_descripcion; ?></td> 
                            <td>
                                <a href=<?php echo base_url()."index.php/cargo/editar/".$datos->car_id; ?> class="btn  btn-minier"><i class="fa fa-pencil"></i></a>
                                <a href=<?php echo base_url()."index.php/cargo/eliminar/".$datos->car_id; ?> class="btn  btn-minier"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="btn-group">
                    <a class="btn btn-primary" href="<?= base_url();?>index.php/cargo/nuevo" class="k-button">Nuevo</a>
            </div>
        </div>
    </div>   
</div>  
                
