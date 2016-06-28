<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Asiento_model extends CI_Model{
        
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

        function selectId($id){
            $sql="SELECT asi.* 

                    FROM viaje as v,  asiento as asi

                    WHERE v.via_id=asi.asi_viaje and 
                           v.via_id=".$id;
                    
            $query=$this->db->query($sql);
            return $query;
       
        }

    }
?>