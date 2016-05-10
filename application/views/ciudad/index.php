<div class="row">
    <div class="col-md-10">
        <div class="box-body table-responsive">
            <table  id="tab" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Empresa</th>
                        <th>Codigo Postal</th>
                        <th>Nombre</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach (@$ciudad as $datos) {  ?>
                        <tr>
                            <td><?= $datos->ciu_id; ?></td>
                            <td><?= $datos->empresa; ?></td>
                            <td><?= $datos->ciu_codigo_postal; ?></td> 
                            <td><?= $datos->ciu_nombre; ?></td> 
                            <td>
                                <a href=<?php echo base_url()."index.php/ciudad/editar/".$datos->ciu_id; ?> class="btn  btn-minier"><i class="fa fa-pencil"></i></a>
                                <a href=<?php echo base_url()."index.php/ciudad/eliminar/".$datos->ciu_id; ?> class="btn  btn-minier"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="btn-group">
                    <a class="btn btn-primary" href="<?= base_url();?>index.php/ciudad/nuevo" class="k-button">Nuevo</a>
            </div>
        </div>
    </div>   
</div>  
                
