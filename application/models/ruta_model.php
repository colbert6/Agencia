<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Ruta_model extends CI_Model{
        
        function __construct(){
            parent::__construct();
            
           // $this->db_pg=$this->load->database('pgsql',TRUE);
        }

        function select(){
            $this->db_my->where('rut_estado',1);
            $query=$this->db_my->get('ruta');
            return $query;
            
        }

        function selectId($id){
            $this->db->where('rut_id',$id);
            $query=$this->db->get('ruta');
            return $query;
       
        }

        function crear($data){
            $this->db->insert('ruta',array('rut_origen' => $data['origen'],
                                            'rut_destino' => $data['destino'],
                                            'rut_precio_base' => $data['precio'],
                                            'raz_estado' => 1 ));
        }

        function editar($data){
            $datos=array('rut_origen' => $data['origen'],
                        'rut_destino' => $data['destino'],
                        'rut_precio_base' => $data['precio']
                        );
            $this->db->where('rut_id',$data['id']);
            $query=$this->db->update('ruta',$datos);
            return $query;
        }

        function eliminar($id){
            $datos=array('rut_estado' => 0   );
            $this->db->where('rut_id',$id);
            $query=$this->db->update('ruta',$datos);
            return $query;
        }

    }
?>