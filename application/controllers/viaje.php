<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
    class Viaje extends CI_Controller
    {   
        
        function __construct(){
            parent::__construct();
            $this->load->model('viaje_model');           
        }
        
        public function index()
        {   
            $data['viaje'] = $this->viaje_model->select();
            $dato= array ( 'titulo'=> 'viaje');
            $this->load->view("/layout/header.php",$dato);
            $this->load->view("/viaje/index.php",$data);
            $this->load->view("/layout/foother_table.php");
        }

        public function nuevo()
        {            
            if (@$_POST['guardar'] == 1) {
                $data= array ('empresa'=> $this->input->post('empresa'),
                              'codigo'=> $this->input->post('codigo'),
                              'nombre'=> $this->input->post('nombre'));
                $this->viaje_model->crear($data);                
                redirect('viaje', 'refresh');
                
            }else{
                $dato= array ( 'titulo'=> 'Registrar viaje','action'=>  'viaje/nuevo' );

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/viaje/form.php");
                $this->load->view("/layout/foother.php");

            }
            
        }

        public function editar()
        {
            
            if (@$_POST['guardar'] == 1) {
                $data= array ( 'per_dni' => $this->input->post('dni'),
                                'per_nombres' => $this->input->post('nombres'),
                                'per_apellidos' => $this->input->post('apellidos'),
                                'per_fecha_nac' => $this->input->post('fecha_nac'),
                                'per_fecha_reg' => $this->input->post('fecha_reg')
                                  );

                $this->viaje_model->editar($data);
                //$this->auditoria('modificar',$this->tabla,'', $data['id']);//auditoria
                $this->redireccionar("viaje");
                
            }else{
                $dato= array ( 'titulo'=> 'Editar viaje','action'=>  'viaje/editar');
                $idRaza=$this->uri-> segment(3);

                $data['viaje']=$this->viaje_model->selectId( $idRaza);

                //echo "<pre>";print_r($data['viaje']->result());exit();
                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/viaje/form.php",$data);
                $this->load->view("/layout/foother.php");

            }
            
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

