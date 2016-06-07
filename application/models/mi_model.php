<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Mi_model extends CI_Model{
        
        function __construct(){
            parent::__construct();
           
            if($this->session->userdata('base')=='civa'){
               $this->db_my=$this->load->database('mysql',TRUE);
               $this->db=$this->db_my;
            }else if($this->session->userdata('base')=='movil_tour'){
               $this->db_pg=$this->load->database('postgre',TRUE);
               $this->db=$this->db_pg;
            }
        }

        function select($tabla){
            $estado=substr($tabla,0, 3)."_estado";
            $this->db->where($estado,1);  
            $query=$this->db->get($tabla);      
            return $query;            
        }

        function selectId($data){
            return $query;
       
        }

        function crear($data){
            $datos=array('car_descripcion' => $data['descripcion'],
                        'car_estado' => 1 );
            if($this->db->insert('cargo',$datos)){
                 $query=0;
            }else{
                 $query=$this->db->_error_message();
            }
            return $query;
        }


        function editar($data){
           $datos=array('car_descripcion' => $data['descripcion']);
            if($this->db->insert('cargo',$datos)){
                 $query=0;
            }else{
                 $query=$this->db->_error_message();
            }
            return $query;
        }

        function eliminar($id){
            return $query;
        }

    }
?>