
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>FISI-UNSM</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="<?= base_url(); ?>css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="<?= base_url(); ?>css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="<?= base_url(); ?>css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?= base_url(); ?>css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url(); ?>css/style.css" rel="stylesheet" type="text/css" />
       
    </head>
    <body class="skin-blue">
        <input type="hidden" id="base_url" value="<?= base_url(); ?>">
                   
        <header class="header">
            <a href="<?= base_url(); ?>index.php" class="logo">
               <?= $this->session->userdata('empresa'); ?>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span><?= $this->session->userdata('nombre'); ?> <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="<?= base_url().'img/'.$this->session->userdata('logo');?>" alt="Imagen Logo" style="width: 95%;" />
                                    <p>
                                        <?= $this->session->userdata('user')?>
                                        <small>Usuario Activo</small>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Perfil</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?= base_url();?>index.php/login/cerrar" class="btn btn-default btn-flat">Cerrar Sesion</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">                
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">                   
                        <img src="<?= base_url().'img/'.$this->session->userdata('logo');?>" alt="Imagen Logo" style="width: 95%;" />                                             
                   </div>
                    <!-- search form -->
                    
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li>
                            <a href="<?= base_url(); ?>index.php">
                                <i class="fa fa-home"></i> <span>Inicio</span>
                            </a>
                        </li>   

                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-cog"></i> <span>Mantenimiento</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?= base_url(); ?>cargo/"><i class="fa fa-angle-double-right"></i>Cargo</a></li>
                                <li><a href="<?= base_url(); ?>ciudad/"><i class="fa fa-angle-double-right"></i>Ciudad</a></li>                                
                                <li><a href="<?= base_url(); ?>vehiculo/"><i class="fa fa-angle-double-right"></i>Vehiculo</a></li>
                                <li><a href="<?= base_url(); ?>terminal/"><i class="fa fa-angle-double-right"></i>Terminal</a></li>
                                <li><a href="<?= base_url(); ?>personal/"><i class="fa fa-angle-double-right"></i>Personal</a></li>
                                <!--li><a href="<?= base_url(); ?>ruta/"><i class="fa fa-angle-double-right"></i>Ruta</a></li-->
                                <li><a href="<?= base_url(); ?>ciudad/"><i class="fa fa-angle-double-right"></i>Ciudad</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-road"></i> <span>Viaje</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?= base_url(); ?>viaje/nuevo_viaje"><i class="fa fa-angle-double-right"></i>Nuevo Viaje</a></li>
                                <li><a href="<?= base_url(); ?>viaje/"><i class="fa fa-angle-double-right"></i>Lista de Viajes</a></li>
                            </ul>
                        </li>
                        <!--li class="treeview">
                            <a href="#">
                                <i class="fa fa-money"></i> <span>Venta de Pasajes</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?= base_url(); ?>index.php/pasaje; ?>"><i class="fa fa-angle-double-right"></i>Pasajes</a></li>
                            </ul>
                        </li-->
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-search"></i> <span>Buscar</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?= base_url(); ?>index.php/busqueda"><i class="fa fa-angle-double-right"></i>Busquedad</a></li>
                            </ul>
                        </li>

                        
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1> 
                       <?= @$titulo;?>
                        <small> </small>
                    </h1>
                    
                </section>

                <!-- Main content -->
                <section class="content">
                