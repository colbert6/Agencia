<?php $via=$viaje->result_array();  ?>
<style type="text/css">
.div_oculto{
    display: none;
}

.div_active{
    display: block;
}
</style>

<input type="hidden" value="1" name="guardar">    
<div class="row"><!-- Formulario de la ruta Viaje -->
    <div class="col-md-11">
        <div class="box box-primary">
            <div class="box-header">
                <i class="fa fa-map-signs"></i>
                <h3 class="box-title">Ruta de Viaje</h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <div class="row">
                        <div class="col-xs-2">
                            <label >Ruta de ciudades: </label>
                        </div>
                        <div class="col-xs-4" >
                            <div class="input-group">
                                <span class="input-group-addon"> Destino: </span>
                                <input class="form-control" id="ciu_origen" name="ciu_origen" placeholder="Origen" readonly
                                    value="<?php echo $via[0]['ori']; ?>">
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="input-group">
                                <span class="input-group-addon"> Destino: </span>
                                <input class="form-control" name="ciu_destino" id="ciu_destino" placeholder="Destino" readonly
                                 value="<?php echo $via[0]['dest']; ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row"><!-- Formulario de la ruta Viaje -->
    <div class="col-md-11">
        <div class="box box-success">
            <div class="box-header">
                <i class="fa fa-calendar"></i>
                <h3 class="box-title">Informacion del Viaje</h3>
            </div>
            <div class="box-body">
                <div class="form-group">       
                    <div class="row">
                        <div class="col-md-8">
                            <div class="col-xs-1">
                                <label>Fechas:</label>
                            </div>
                            <div class="col-xs-5" style=" border-top:2px; ">
                                <div class="input-group">
                                    <span class="input-group-addon">Salida</span>
                                    <input class="form-control" name="fecha_salida" id="fecha_salida" placeholder="Destino" readonly
                                    value="<?php echo $via[0]['via_fecha_salida'].' '.$via[0]['via_hora_salida']; ?>">
                                </div>
                            </div>
                            <div class="col-xs-5" style=" border-top:2px; ">
                                <div class="input-group">
                                    <span class="input-group-addon">LLegada</span>
                                    <input class="form-control" name="fecha_llegada" id="fecha_llegada" placeholder="Destino" readonly
                                     value="<?php echo $via[0]['via_fecha_llegada'].' '.$via[0]['via_hora_llegada']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="col-xs-3">
                                <label>Precio</label>
                            </div>
                            <div class="col-xs-9">
                                <div class="input-group">
                                    <span class="input-group-addon">S/.</span>
                                    <input type="number" class="form-control" name="precio" id="precio" placeholder="Precio" readonly
                                         value="<?php echo $via[0]['via_precio']; ?>">
                                </div>
                            </div>  
                        </div>  
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">                                       
                        <div class="col-xs-1">
                            <label > &nbsp;&nbsp;&nbsp;&nbsp;Vehiculo: </label>
                        </div>
                        <div class="col-xs-3" >
                            <div class="input-group">
                                <span class="input-group-addon">Tipo</span>
                                <input class="form-control" name="tipo_vehiculo" id="tipo_vehiculo" readonly
                                 value="<?php echo $via[0]['veh_tipo']; ?>">
                            </div>
                        </div>
                        <div class="col-xs-3" >
                            <div class="input-group">
                                <span class="input-group-addon">Descp.</span>
                                <input class="form-control" name="vehiculo" id="vehiculo" readonly
                                 value="<?php echo $via[0]['veh_descripcion']; ?>">
                            </div>
                        </div>
                        <div class="col-xs-3" >
                            <div class="input-group">
                                <span class="input-group-addon">Matricula</span>
                                <input class="form-control" name="vehiculo" id="vehiculo" readonly
                                 value="<?php echo $via[0]['veh_matricula']; ?>">
                            </div>
                        </div>                        
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="row"><!-- Formulario de la ruta Viaje -->
    <div class="col-md-5">
        <div class="box box-danger">
            <div class="box-header">
                <i class="fa fa-users"></i>
                <h3 class="box-title">Personal</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <ul class="todo-list" id="lista_personal">
                                
                                    <?php 
                                    foreach ($personal->result() as $datos) {
                                       echo "<li >";
                                       echo "<span class='handle'><i class='fa fa-user'></i></span> ";
                                       echo "<span class='text'>".$datos->per_nombres." </span>";
                                       echo "<small class='label label-info'>".$datos->car_descripcion."</small>";
                                       echo "</li >";
                                    }


                                    ?>
                                
                            </ul>
                        </div>                     
                    </div> 
                </div>     
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="box box-danger">
            <div class="box-header">
                <h3 class="box-title">Lista de Pasajeros</h3>
                <div class="box-tools">
                    <ul class="pagination pagination-sm no-margin pull-right">
                        <li><a id="adelante_pasajero" onclick='MoverPas("-")'  style="cursor:pointer">&laquo;</a></li>                        
                        <li><a id="atras_pasajero" onclick='MoverPas("+")'  style="cursor:pointer">&raquo;</a></li>
                    </ul>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body no-padding">
                    <?php 
                    $pagina=1;$datos=$asientos->result_array();

                    //echo "<pre>";print_r($datos);echo $datos[0]['asi_num'];
                                         
                        echo "<div >";                        
                        echo "    <table class='table'>";
                        echo "        <tr>";
                        echo "            <th style='width: 10px'>Asiento</th>";
                        echo "            <th>Pasajero</th>";
                        echo "            <th>Dni</th>";
                        echo "            <th style='width: 40px'>Edad</th>";
                        echo "        </tr>";
                    

                    for ($i=0;$i<count($datos);$i++) {    
                            

                        echo "      <tr>";
                        echo "          <td align='center' ><span class='badge bg-green'>".$datos[$i]['asi_num']."</span></td>";
                        echo "          <td>".$datos[$i]['pas_nombre']." ".$datos[$i]['pas_apellidos']."</td>";
                        echo "          <td>".$datos[$i]['pas_dni']."</td>";
                        echo "          <td>".$datos[$i]['pas_edad']."</td>";
                        echo "      </tr>"; 

                    }    
                       

                        echo "    </table>";
                        echo "</div>";
                    

                    ?>
                    
                    
                    </div>
                
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div><!-- /.col -->

<a class="btn btn-primary " href="javascript:history.go(-1);">
    <i class="fa fa-arrow-circle-o-left"></i>&nbsp; Volver
</a>


<script type="text/javascript">
    function MoverPas(filtro){
        
        var pagina=$('.div_active').children('input[type="hidden"]').val();
        alert('as'+filtro+' pag: '+pagina);

    }

</script>