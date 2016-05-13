<?php
?>
<div class="row">
    <div class="col-md-10">
        <div class="box-body table-responsive">
            <table  id="tab" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <?php
                        foreach (array_keys($consulta->row_array()) as $value) {
                                $nombre=ucwords(substr($value,4));
                                echo "<th>$nombre</th>  "  ;   
                            }
                         ?>

                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach (@$consulta->result_array() as $filas) {    ?>
                        <tr>
                            <?php
                            $value=array_values($filas);
                            foreach (array_values($filas) as $value) {
                                echo "<td>$value</td>" ;   
                            }  ?>
                            <td>
                                <a href=<?php echo base_url()."index.php/cargo/editar/".$value[0]; ?> class="btn  btn-minier"><i class="fa fa-pencil"></i></a>
                                <a href=<?php echo base_url()."index.php/cargo/eliminar/".$value[0]; ?> class="btn  btn-minier"><i class="fa fa-trash-o"></i></a>
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
                
