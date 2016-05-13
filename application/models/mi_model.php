<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Mi_model extends CI_Model{
        
        function __construct(){
            parent::__construct();

            if($this->session->userdata('base')=='civa'){
               $this->db=$this->db_my;
            }else if($data['base']=='movi_tour'){
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
            return $query;
        }


        function editar($data){
           
            return $query;
        }

        function eliminar($id){
            return $query;
        }

    }
?>