<link href="<?= base_url(); ?>css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />

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
                            <select class="form-control" id="empresa" name="empresa" >
                                <option value="" >Seleccione Origen</option>
                            </select>
                        </div>
                        <div class="col-xs-4">
                            <select class="form-control" id="empresa" name="empresa">
                                <option value="">Seleccione Destino</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-xs-2">
                            <label >Ruta de Terminales: </label>
                        </div>
                        <div class="col-xs-4" >
                            <select class="form-control" id="empresa" name="empresa" >
                                <option value="" >Seleccione Terminal Origen</option>
                            </select>
                        </div>
                        <div class="col-xs-4">
                            <select class="form-control" id="empresa" name="empresa">
                                <option value="">Seleccione Terminal Destino</option>
                            </select>
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
                            <div class="col-xs-4">
                                <label>Fecha de Salida y llegada:</label>
                            </div>
                            <div class="col-xs-8">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-clock-o"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right" id="reservationtime"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="col-xs-2">
                                <label>Precio</label>
                            </div>
                            <div class="col-xs-8">
                                <div class="input-group">
                                    <span class="input-group-addon">S/.</span>
                                    <input type="number" class="form-control" placeholder="Precio">
                                </div>
                            </div>  
                        </div>  
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-8">                 
                                <div class="col-xs-4">
                                    <label >Vehiculo: </label>
                                </div>
                                <div class="col-xs-4" >
                                    <select class="form-control" id="empresa" name="empresa" >
                                        <option value="" >Seleccione Tipo Vehiculo</option>
                                        <option value='bus_simple'>Bus Simple</option>
                                        <option value='bus_doble'>Bus doble</option>
                                        <option value='bus_exclusivo'>Bus Exclusivo</option>
                                    </select>
                                </div>
                                <div class="col-xs-4" >
                                    <select class="form-control" id="empresa" name="empresa" >
                                        <option value="" >Seleccione Vehiculo</option>
                                    </select>
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
        <div class="box box-danger">
            <div class="box-header">
                <i class="fa fa-users"></i>
                <h3 class="box-title">Personal</h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <div class="row">                    
                        <div class="col-md-4">      
                            <div class="callout callout-info">
                                <h4>Conductor: </h4>
                                <p>-Juan Perez </br> -Rodrigo Valentin</p>
                            </div>
                        </div>
                        <div class="col-md-4">      
                            <div class="callout callout-info">
                                <h4>Aeromozas: </h4>
                                <p>-Juana Pereza </br> -Roberta Valentina</p>
                            </div>
                        </div>                    
                        <div class="col-md-4">      
                            <div class="callout callout-info">
                                <h4>Mecanico: </h4>
                                <p>-Juana Pereza </br> -Roberta Valentina</p>
                            </div>
                        </div>
                        <div class="col-md-4">      
                            <div class="callout callout-info">
                                <h4>Auxiliar: </h4>
                                <p>-Juana Pereza </br> -Roberta Valentina</p>
                            </div>
                        </div>        
                    </div>
                </div>    
                <div class="form-group">
                    <div class="row">               
                            <div class="col-xs-2">
                                <label> &nbsp;&nbsp;&nbsp;&nbsp;Personal: </label>
                            </div>
                            <div class="col-xs-4" >
                                <select class="form-control" id="empresa" name="empresa" >
                                    <option value="" >Seleccione Cargo</option>
                                    <option value=''>Chofer</option>
                                    <option value=''>Aeromoza</option>
                                    <option value=''>Mecanico</option>
                                </select>
                            </div>
                            <div class="col-xs-6" >
                                <div class="input-group ">
                                    <select class="form-control" id="empresa" name="empresa" >
                                        <option value=''>Juan Lozano</option>
                                        <option value=''>Rene Cartera</option>
                                        <option value=''>Prince Fedora</option>
                                    </select>
                                        <span class="input-group-btn">
                                            <button class="btn btn-info btn-flat" type="button">+</button>
                                        </span>
                                </div>
                            </div>         
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

