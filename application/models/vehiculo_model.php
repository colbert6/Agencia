<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Vehiculo_model extends CI_Model{
        
        function __construct(){
            parent::__construct();
            
           // $this->db_pg=$this->load->database('pgsql',TRUE);
        }

        function select(){
            $this->db_my->where('veh_estado',1);
            $query=$this->db_my->get('vehiculo');
            return $query;
            
        }

        function selectId($id){
            $this->db->where('veh_id',$id);
            $query=$this->db->get('vehiculo');
            return $query;
       
        }

        function crear($data){
            $this->db->insert('vehiculo',array('veh_tipo' => $data['tipo'],
                            'veh_descripcion' => $data['descripcion'],
                            'veh_matricula' => $data['matricula'],
                            'veh_fecha_compra' => $data['fecha_compra'],
                            'veh_num_asientos' => $data['num_asientos'],
                            'raz_estado' => 1 ));
        }

        function editar($data){
            $datos=array('veh_tipo' => $data['tipo'],
                        'veh_descripcion' => $data['descripcion'],
                        'veh_matricula' => $data['matricula'],
                        'veh_fecha_compra' => $data['fecha_compra'],
                        'veh_num_asientos' => $data['num_asientos']
                        );
            $this->db->where('veh_id',$data['id']);
            $query=$this->db->update('vehiculo',$datos);
            return $query;
        }

        function eliminar($id){
            $datos=array('veh_estado' => 0   );
            $this->db->where('veh_id',$id);
            $query=$this->db->update('vehiculo',$datos);
            return $query;
        }

    }
?>