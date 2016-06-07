<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Terminal_model extends CI_Model{
        
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
            $this->db->where("ter_estado",1);  
            $query=$this->db->get("terminal");    
            return $query;            
        }

        function selectId($id){
            
            return $query;
        }

        function crear($data){
            $datos=array(
                        'ter_descripcion' => $data['descripcion'],
                        'ter_direccion' => $data['direccion'],
                        'ter_ciudad' => $data['ciudad'],
                        'ter_estado' => 1 );
            if($this->db->insert('terminal',$datos)){
                 $query=0;
            }else{
                 $query=$this->db->_error_message();
            }
            return $query;            
        }

        function editar($data){
            $datos=array(
                        'ter_descripcion' => $data['descripcion'],
                        'ter_direccion' => $data['direccion'],
                        'ter_ciudad' => $data['ciudad']);
            $this->db->where("ter_id",$data['id']);
            if($this->db->update('terminal',$datos)){
                 $query=0;
            }else{
                 $query=$this->db->_error_message();
            }
            return $query;
        }

        function eliminar($id){
            $datos=array('ter_estado' => 0 );
            $this->db->where("ter_id",$id);
            if($this->db->update('terminal',$datos)){
                 $query=0;
            }else{
                 $query=$this->db->_error_message();
            }
            return $query;
        }

    }
?>