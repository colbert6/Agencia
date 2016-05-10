<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
    class Vehiculo extends CI_Controller
    {   
        
        function __construct(){
            parent::__construct();
            $this->load->model('vehiculo_model');           
        }
        
        public function index()
        {   
            $data['vehiculo'] = $this->vehiculo_model->select();
            $dato= array ( 'titulo'=> 'vehiculo');
           
            $this->load->view("/layout/header.php",$dato);
            $this->load->view("/vehiculo/index.php",$data);
            $this->load->view("/layout/foother_table.php");
        }

        public function nuevo()
        {            
            if (@$_POST['guardar'] == 1) {
                $data= array ( 'empresa'=> $this->input->post('empresa'),
                                'tipo'=> $this->input->post('tipo'),
                                'descripcion'=> $this->input->post('descripcion'),
                              'matricula'=> $this->input->post('matricula'),
                              'fecha_compra'=> $this->input->post('fecha_compra'),
                              'num_asientos'=> $this->input->post('num_asientos')
                               );

                $this->vehiculo_model->crear($data);                
                
                redirect('vehiculo', 'refresh');
                
            }else{
                $dato= array ( 'titulo'=> 'Registrar vehiculo','action'=>  'vehiculo/nuevo' );

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/vehiculo/form.php");
                $this->load->view("/layout/foother.php");

            }
            
        }

        public function editar()
        {
            
            if (@$_POST['guardar'] == 1) {
                $data= array ( 'tipo'=> $this->input->post('tipo'),
                                'descripcion'=> $this->input->post('descripcion'),
                              'matricula'=> $this->input->post('matricula'),
                              'fecha_compra'=> $this->input->post('fecha_nac'),
                              'num_asientos'=> $this->input->post('num_asientos')
                                  );

                $this->vehiculo_model->editar($data);
                //$this->auditoria('modificar',$this->tabla,'', $data['id']);//auditoria
                $this->redireccionar("vehiculo");
                
            }else{
                $dato= array ( 'titulo'=> 'Editar vehiculo','action'=>  'vehiculo/editar');
                $idRaza=$this->uri-> segment(3);

                $data['vehiculo']=$this->vehiculo_model->selectId( $idRaza);

                //echo "<pre>";print_r($data['vehiculo']->result());exit();
                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/vehiculo/form.php",$data);
                $this->load->view("/layout/foother.php");

            }
            
        }

        public function eliminar()
        {
            $id=$this->uri-> segment(3);
            $this->vehiculo_model->eliminar($id);
            //$this->auditoria('eliminar',$this->tabla,'', $id);//auditoria
            $this->redireccionar("vehiculo");
            
            
        }


    }
 ?>

