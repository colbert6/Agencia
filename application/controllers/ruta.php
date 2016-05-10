<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
    class Ruta extends CI_Controller
    {   
        
        function __construct(){
            parent::__construct();
            $this->load->model('ruta_model');           
        }
        
        public function index()
        {   
            $data['ruta'] = $this->ruta_model->select();
            $dato= array ( 'titulo'=> 'Rutas');
           
            $this->load->view("/layout/header.php",$dato);
            $this->load->view("/ruta/index.php",$data);
            $this->load->view("/layout/foother_table.php");
        }

        public function nuevo()
        {            
            if (@$_POST['guardar'] == 1) {
                $data= array ( 'origen'=> $this->input->post('origen'),
                              'destino'=> $this->input->post('destino'),
                              'precio'=> $this->input->post('precio') );

                $this->ruta_model->crear($data);                
                
                redirect('ruta', 'refresh');
                
            }else{
                $dato= array ( 'titulo'=> 'Registrar ruta','action'=>  'ruta/nuevo' );

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/ruta/form.php");
                $this->load->view("/layout/foother.php");

            }
            
        }

        public function editar()
        {
            
            if (@$_POST['guardar'] == 1) {
                $data= array ( 'id'=> $this->input->post('id'),
                                'descripcion'=> $this->input->post('descripcion'),
                                'direccion'=> $this->input->post('direccion'),
                                'ciudad'=> $this->input->post('ciudad')
                                  );

                $this->ruta_model->editar($data);
                //$this->auditoria('modificar',$this->tabla,'', $data['id']);//auditoria
                $this->redireccionar("ruta");
                
            }else{
                $dato= array ( 'titulo'=> 'Editar ruta','action'=>  'ruta/editar');
                $idRaza=$this->uri-> segment(3);

                $data['ruta']=$this->ruta_model->selectId( $idRaza);

                //echo "<pre>";print_r($data['ruta']->result());exit();
                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/ruta/form.php",$data);
                $this->load->view("/layout/foother.php");

            }
            
        }

        public function eliminar()
        {
            $id=$this->uri-> segment(3);
            $this->ruta_model->eliminar($id);
            //$this->auditoria('eliminar',$this->tabla,'', $id);//auditoria
            $this->redireccionar("ruta");
            
            
        }


    }
 ?>

