<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Cargo_model extends CI_Model{
        
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

        function select(){
            $this->db->where("car_estado",1);  
            $query=$this->db->get("cargo");      
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
            $datos=array('car_descripcion' => $data['descripcion'] );
            $this->db->where("car_id",$data['id']);
            if($this->db->update('cargo',$datos)){
                 $query=0;
            }else{
                 $query=$this->db->_error_message();
            }
            return $query;
        }

        function eliminar($id){
            $datos=array('car_estado' => 0 );
            $this->db->where("car_id",$id);
            if($this->db->update('cargo',$datos)){
                 $query=0;
            }else{
                 $query=$this->db->_error_message();
            }
            return $query;
        }

    }
?>