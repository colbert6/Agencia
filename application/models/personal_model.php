<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Personal_model extends CI_Model{
        
        function __construct(){
            parent::__construct();
            
           // $this->db_pg=$this->load->database('pgsql',TRUE);
        }

        function select(){
            $this->db_my->where('per_estado',1);
            $query=$this->db_my->get('personal');
            return $query;
            
        }

        function selectId($id){
            $this->db->where('per_id',$id);
            $query=$this->db->get('personal');
            return $query;
       
        }

        function crear($data){
            $this->db->insert('personal',array('per_dni' => $data['dni'],
                                            'per_nombres' => $data['nombres'],
                                            'per_apellidos' => $data['apellidos'],
                                            'per_fecha_nac' => $data['fecha_nac'],
                                            'per_fecha_reg' => $data['fecha_reg'],
                                            'raz_estado' => 1 ));
        }

        function editar($data){
            $datos=array('per_dni' => $data['dni'],
                        'per_nombres' => $data['nombres'],
                        'per_apellidos' => $data['apellidos'],
                        'per_fecha_nac' => $data['fecha_nac'],
                        'per_fecha_reg' => $data['fecha_reg']
                        );
            $this->db->where('per_id',$data['id']);
            $query=$this->db->update('personal',$datos);
            return $query;
        }

        function eliminar($id){
            $datos=array('per_estado' => 0   );
            $this->db->where('per_id',$id);
            $query=$this->db->update('personal',$datos);
            return $query;
        }

    }
?>