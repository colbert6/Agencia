<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
    class Viaje extends CI_Controller
    {   
        
        function __construct(){
            parent::__construct();
            $this->load->model('viaje_model');
            $this->load->model('ciudad_model');
            $this->load->model('vehiculo_model');
            $this->load->model('cargo_model');  
            $this->load->model('personal_model');           
        }
        

        public function nuevo_viaje()
        {            
            $dato_header= array ( 'titulo'=> 'Registrar Viaje');
            $data= array (  'ciudad'=>$this->ciudad_model->select(),
                            'vehiculo'=>$this->vehiculo_model->select(),
                            'cargo'=>$this->cargo_model->select(),
                            'personal'=>$this->personal_model->select());

            $this->load->view("/layout/header.php",$dato_header);
            $this->load->view("/viaje/nuevo_viaje.php",$data);
            $this->load->view("/viaje/foother_nuevo_viaje.php");
        }

        public function guardar_nuevo_viaje()
        {
            echo "<pre>";print_r($_POST);//exit();
            if (@$_POST['guardar'] == 1) {
                $fecha=$this->input->post('fecha_viaje');
                $fecha_viaje = explode(" ", $fecha);

                $data= array ('via_origen'=> $this->input->post('ciu_origen'),
                              'via_destino'=> $this->input->post('ciu_destino'),
                              'via_vehiculo'=> $this->input->post('vehiculo'),
                              'via_precio'=> $this->input->post('precio'),
                              'via_fecha_salida'=> $fecha_viaje[0],
                              'via_fecha_llegada'=> $fecha_viaje[1],
                              'via_hora_salida'=> $fecha_viaje[3],
                              'via_hora_llegada'=>  $fecha_viaje[4]
                              );
                $result=$this->viaje_model->crearViaje($data) ;
                $viaje_nuevo=$result['msg']->result_array();
                $id_nuevo_viaje= $viaje_nuevo[0]['via_id'];
                print_r( $viaje_nuevo);echo $viaje_nuevo[0]['via_id'];

                if($result['resp']=='0' ){
                    for ($i=0; $i<count($_POST['personales']); $i++) { 
                        //mandar a personal y viaje
                        $data= array ('via_id'=> $id_nuevo_viaje,
                              'per_id'=>  $_POST['personales'][$i]
                              );
                        $result=$this->viaje_model->crearViajePersonal($data) ;
                        echo $result['msg']; 
                    }

                }
                redirect('viaje/nuevo_viaje', 'refresh');
                
            }
        }

        public function index()
        {   
            $data['viaje'] = $this->viaje_model->select();
            $dato= array ( 'titulo'=> 'viaje');
            //echo"<pre>";print_r($data['viaje']);exit();
            $this->load->view("/layout/header.php",$dato);
            $this->load->view("/viaje/index.php",$data);
            $this->load->view("/layout/foother_table.php");
        }

        public function venta_pasaje()
        {   
            $id=$_REQUEST['idviaje'];
            $tipo=$_REQUEST['tipobus'];
            $data['viaje'] = $this->viaje_model->selectId($id);
            $data['asiento']=$this->viaje_model->selectAsi($id);
            $data['id']= $id;
            $dato= array ( 'titulo'=> 'Venta de Pasaje(s)');
            //echo"<pre>";print_r($data['viaje']->result());exit();
            $this->load->view("/layout/header.php",$dato);
            $this->load->view("/viaje/venta_".$tipo.".php",$data);
            $this->load->view("/viaje/foother_venta_pasaje.php");
        }

        
        public function nuevo()
        {            
            if (@$_POST['guardar'] == 1) {
                $data= array ('empresa'=> $this->input->post('empresa'),
                              'origen'=> $this->input->post('origen'),
                              'destino'=> $this->input->post('destino'));
                $this->viaje_model->crear($data);                
                redirect('viaje', 'refresh');
                
            }else{
                $dato= array ( 'titulo'=> 'Registrar viaje','action'=>  'viaje/nuevo' );

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/viaje/form.php");
                $this->load->view("/layout/foother.php");

            }
            
        }

        public function guardar()
        {
         $obj=  $this->viaje_model->guardarViaje($_REQUEST);
         print_r(json_encode($obj));
        }
        public function eliminar()
        {
            $id=$this->uri-> segment(3);
            $this->viaje_model->eliminar($id);
            //$this->auditoria('eliminar',$this->tabla,'', $id);//auditoria
            $this->redireccionar("viaje");
            
            
        }


    }
 ?>

