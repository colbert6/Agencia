<style type="text/css">

.civa{width:960px;height:500px;background:#f1f1ef;border-radius: 10px;margin:auto; }
.leyenda{width: 100%;height: 50px;padding: 10px 30px;box-sizing: border-box;}
.dato_viaje{width: 100%;height: 50px;padding: 5px 30px;box-sizing: border-box;}
.img{position: relative;width: 180px;height: 30px;float: left;margin-right: 20px; }
h4{position: absolute;margin:0;top: 12px;left: 33px;text-transform: uppercase;color: #555;font-size: 13px}
.bus{width: 100%;height: 250px;position: relative;top:5px;}
.cabeza{position: absolute;left: 20%}
.cuerpo{position: absolute;background: #fff;height: 196px;width: 57.5%;left: 26.3%;top:12px;}
.borde{border-radius: 5px;border-top-left-radius: 0;border-bottom-left-radius: 0;border-top: 1px solid #cdcdcd;border-bottom: 1px solid #cdcdcd;border-right: 1px solid #cdcdcd}
.p{padding: 3px;margin-top: 0;margin-bottom: 0;text-align: center;color: red;font-size: 14px}
.iu-asiento{background: url('/Agencia/img/asiento.png')no-repeat;cursor: pointer;}
.asiento-acupado{background: url('/Agencia/img/asiento_no_disponible.png')no-repeat;}
.asiento-seleccionado{background: url('/Agencia/img/asiento_seleccionado.png')no-repeat;cursor: pointer;}
.op-asiento{cursor: pointer;}
h5{font-size: 12px;margin:0;padding-left: 4px;color:#666666;}
td{width: 34px;height: 28px;margin-right: 8px;}
.sal{width: 100%;height: 130px;position: absolute;top: 250px;}
.salida{width: 270px;height: 90px;margin-top: 0px;padding: 0 50px}
.color{color:#000;}
.totales{width: 230px;height: 70px;float: right;margin-right: 450px;margin-top: -93px}
.siguiente{position: relative;right: -711px;}
.cabeza1{position: absolute;left: 10%}
.piso1{position: absolute;left: 16%;width: 180px;background: #fff;height: 196px;top:12px;}
.cuerpo1{position:absolute;width: 56%;left:35.7%;background: #fff;top: 12px;height: 196px;border-radius: 5px;border:1px solid #cdcdcd;}
.cabeza2{position: absolute;left: 20%}
.piso2{position: absolute;left: 26%;width: 180px;background: #fff;height: 196px;top:12px;}
.cuerpo2{position:absolute;width: 32%;left:45.7%;background: #fff;top: 12px;height: 196px;border-radius: 5px;border:1px solid #cdcdcd;}
</style>

<?php $viaje=$viaje->row(); 
    $asiento=$asiento->result();
?>
<!-- Custom Tabs -->
<div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
        <li id="li_tab_1" class="active"><a href="#tab_1" data-toggle="tab">Asiento(s)</a></li>
        <li id="li_tab_2"><a >Datos del pasajero(s)</a></li>
        <li id="li_tab_3"><a href="#tab_3" data-toggle="tab">Confirmacion</a></li>       
    </ul>
    <div class="tab-content">
        <div class="tab-pane active"  id="tab_1">
            <div class="civa">
                <div class="dato_viaje">
                  <?php echo "<h3>".$viaje->ori." - ".$viaje->dest.
                        " / Salida: ".$viaje->via_fecha_salida." - ".$viaje->via_hora_salida.
                            " / ".$viaje->veh_tipo.
                            "</h3>";

                  ?>                       
                </div>
                <div class="leyenda">
                    <div class="img">
                        <img src="/Agencia/img/asiento.png" alt="">
                        <h4>Disponible</h4>
                    </div>
                    <div class="img">
                        <img src="/Agencia/img/asiento_seleccionado.png" alt="">
                        <h4>Seleccionado</h4>
                    </div>
                    <div class="img">
                        <img src="/Agencia/img/asiento_no_disponible.png" alt="">
                        <h4>Ocupado</h4>
                    </div>
                </div>
                <div class="bus">
                    <div class="cabeza">
                        <img src="/Agencia/img/bus_cab.png" alt="">
                    </div>
                    <div class="cuerpo borde">
                        <table id="valor">
                            <thead>
                                <p class="p">Piso 1</p>
                            </thead>
                            <tbody>
                                <tr>
                                <?php for ($i=3; $i <=51 ; $i=$i+4) {
                                    $cont=0;
                                    foreach ($asiento as $value) {
                                        $asi=$value->asi_num;
                                        if ($i==$asi) { $cont=1;?>
                                            <td class="asiento-acupado" id="asiento-<?= $i;?>"><h5><?= $i;?></h5></td>
                                        <?php
                                        }
                                    }
                                    if ($cont!=1) {?>
                                        
                                        <td class="iu-asiento" id="asiento-<?= $i;?>"><h5><?= $i;?></h5></td>
                                    <?php
                                    }
                                    ?>                                      
                                <?php }?>                               
                                </tr>
                                <tr>
                                <?php for ($i=4; $i <=52 ; $i=$i+4) {
                                    $cont=0;
                                    foreach ($asiento as $value) {
                                        $asi=$value->asi_num;
                                        if ($i==$asi) { $cont=1;?>
                                            <td class="asiento-acupado" id="asiento-<?= $i;?>"><h5><?= $i;?></h5></td>
                                        <?php
                                        }
                                    }
                                    if ($cont!=1) {?>
                                        
                                        <td class="iu-asiento" id="asiento-<?= $i;?>"><h5><?= $i;?></h5></td>
                                    <?php
                                    }
                                    ?>                                      
                                <?php }?>                               
                                </tr>
                                <tr>
                                    <td><img src="/Agencia/img/icon_tv.png" alt=""></td>
                                    <td></td>   <td></td>   <td></td>
                                    <td><img src="/Agencia/img/icon_tv.png" alt=""></td>
                                    <td></td>   <td></td>   <td></td>
                                    <td><img src="/Agencia/img/icon_tv.png" alt=""></td>
                                </tr>
                                <tr>
                                <?php for ($i=2; $i <=50 ; $i=$i+4) {
                                    $cont=0;
                                    foreach ($asiento as $value) {
                                        $asi=$value->asi_num;
                                        if ($i==$asi) { $cont=1;?>
                                            <td class="asiento-acupado" id="asiento-<?= $i;?>"><h5><?= $i;?></h5></td>
                                        <?php
                                        }
                                    }
                                    if ($cont!=1) {?>
                                        
                                        <td class="iu-asiento" id="asiento-<?= $i;?>"><h5><?= $i;?></h5></td>
                                    <?php
                                    }
                                    ?>                                      
                                <?php }?>                               
                                </tr>
                                <tr>
                                <?php for ($i=1; $i <=53 ; $i=$i+4) {
                                    $cont=0;
                                    foreach ($asiento as $value) {
                                        $asi=$value->asi_num;
                                        if ($i==$asi) { $cont=1;?>
                                            <td class="asiento-acupado" id="asiento-<?= $i;?>"><h5><?= $i;?></h5></td>
                                        <?php
                                        }
                                    }
                                    if ($cont!=1) {?>
                                        
                                        <td class="iu-asiento" id="asiento-<?= $i;?>"><h5><?= $i;?></h5></td>
                                    <?php
                                    }
                                    ?>                                      
                                <?php }?>                               
                                </tr>                 
                            </tbody>
                        </table>
                    </div>
                    <div class="sal">                
                        <div class="salida">
                            <strong><?php echo "Salida: ".$viaje->via_hora_salida;?></strong>
                        </div>
                        <div class="totales">
                            <strong>Números de Asientos: </strong><p id='num_asientos'></p>
                            <h3>Total: </h3><p id='cant_asiento'>0</p>
                        </div>
                        <div class="siguiente">
                            <a class="btn btn-primary pull-left" id="sgt_datos" ><i class="fa  fa-arrow-right"></i> <strong>Siguiente </strong></a>
                        </div>
                    </div>
            
                </div>
            </div>
        </div><!-- /.tab-pane -->
        <div class="tab-pane" id="tab_2">
            <form id="datos_pasajeros" action="<?= base_url()."viaje/mostrar"?>" method="post" accept-charset="utf-8">
                
            <input type="hidden" name="idviaje" value="<?= $_REQUEST['idviaje'] ?>">
            <div class="box box-danger">
                <div class="box-header">
                    <h3 class="box-title">Datos de los Pasajero(s)</h3>
                </div>
                <div class="box-body">
                    <div class="row" id="cueroFormulario">
                    </div>
                    <div class="siguiente">
                    <button class="btn btn-primary pull-left" id="sgt_recibo"  type="submit" >Sigiente</button>
                      <!--  <a  ><i class="fa  fa-arrow-right"></i> <strong>Siguiente </strong></a>-->
                    </div>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
            </form>
        </div><!-- /.tab-pane -->
        <div class="tab-pane" id="tab_3">
            <!-- Main content -->
                <section class="content invoice">                    
                    <!-- title row -->
                    <div class="row">
                        <div class="col-xs-12">
                            <h2 class="page-header">
                                <i class="fa fa-globe"></i> Datos de la venta de pasaje(s)
                                <small class="pull-right"><?php echo "Fecha: ".date("d/m/Y");?></small>
                            </h2>                            
                        </div><!-- /.col -->
                    </div>
                    <!-- info row -->
                    
                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                            <b>Fecha de salida </b><br/>
                            <?php echo $viaje->via_fecha_salida;?>
                        </div>
                        <div class="col-sm-4 invoice-col">
                            <address>
                                <strong>Ciudad origen</strong><br>
                                <?php echo $viaje->ori;?>  
                            </address>
                        </div>
                        <div class="col-sm-4 invoice-col">
                        
                            <address>
                                <strong>Ciudad destino</strong><br>
                                <?php echo $viaje->dest;?>  
                            </address>
                        </div>
                        
                    </div>


                    <!-- Table row -->
                    <div class="row">
                        <div class="col-xs-12 table-responsive">
                            <table class="table table-striped" id="tablaDatos">
                                <thead>
                                    
                                    <tr>
                                        <th>N°</th>
                                        <th>DNI</th>
                                        <th>Nombre</th>
                                        <th>Apellidos</th>
                                        <th>Sexo</th>
                                    </tr>                              
                                </thead>
                                <tbody>
                                   
                                </tbody>
                            </table>                            
                        </div><!-- /.col -->
                    </div><!-- /.row -->

                    <div class="row">
                        <!-- accepted payments column -->
                        <div class="col-xs-6">
                            <p class="lead">Condiciones de pago:</p>
                            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                                Una vez realizada la venta de pasaje(s), ya no hay devolucion de su dinero.
                            </p>
                        </div><!-- /.col -->
                        <div class="col-xs-6">
                            <p class="lead"><?php echo "Monto a pagar: ".date("d/m/Y");?></p>
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th style="width:50%">Subtotal:</th>
                                        <td><?php echo "S/ ".$viaje->via_precio;?></td>
                                    </tr>
                                    <tr>
                                        <th>Cantidad pasajes: </th>
                                        <td id="cant_asientos"></td>
                                    </tr>
                                    <tr>
                                        <th>Total:</th>
                                        <td><?php

                                         $total=3*$viaje->via_precio;
                                                echo "S/ ".$total;
                                        ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div><!-- /.col -->
                    </div><!-- /.row -->

                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                        <div class="col-xs-12">
                            <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Imprimir</button>
                            <button id="submit" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Comprar Pasaje(s)</button>  
                        </div>
                    </div>
                </section><!-- /.content -->
        </div><!-- /.tab-pane -->
    </div><!-- /.tab-content -->
</div><!-- nav-tabs-custom -->

    