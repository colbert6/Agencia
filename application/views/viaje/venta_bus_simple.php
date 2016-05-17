<style type="text/css">

.civa{width:960px;height:450px;background:#f1f1ef;border-radius: 10px;margin:auto; }
.leyenda{width: 100%;height: 50px;padding: 10px 30px;box-sizing: border-box;}
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
h5{font-size: 10px;margin:0;padding-left: 4px;color:#666666;}
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

<div class="civa">
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
                            <?php for ($i=3; $i<=51 ; $i=$i+4) { ?>
                              <td class="iu-asiento" id="asiento-<?php echo $i;?>"><h5><?php echo $i;?></h5></td>
                            <?php }?>                       
                        </tr>
                        <tr>
                            <?php for ($i=4; $i <=52 ; $i=$i+4) { ?>
                              <td class="iu-asiento" id="asiento-<?= $i;?>"><h5><?= $i;?></h5></td>
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
                            <?php for ($i=2; $i <=50 ; $i=$i+4) { ?>
                              <td class="iu-asiento" id="asiento-<?= $i;?>"><h5><?= $i;?></h5></td>
                            <?php }?> 
                        </tr>
                        <tr>
                            <?php for ($i=1; $i <=53 ; $i=$i+4) { ?>
                              <td class="iu-asiento" id="asiento-<?= $i;?>"><h5><?= $i;?></h5></td>
                            <?php }?> 
                        </tr>                  
                    </tbody>
                </table>
            </div>
            <div class="sal">                
                <div class="salida">
                    <strong>Salida: 3:00 pm</strong>
                </div>

                <div class="totales">
                    <strong>Números de Asientos: </strong><p id='num_asientos'></p>
                    <h3>Total: </h3><p id='cant_asiento'>0</p>
                </div>
                <div class="siguiente">
                    <a class="btn btn-primary pull-left" id="nuevo_modal"><i class="fa  fa-arrow-right"></i> <strong>Siguiente </strong></a>
                </div>
            </div>
            
        </div>
        
    </div>
    