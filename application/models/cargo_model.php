<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Cargo_model extends CI_Model{
        
        function __construct(){
            parent::__construct();

    
        }

        function select(){
            $this->db_my->select(" 'Civa' as 'empresa', car_id , car_descripcion", FALSE);
            $this->db_my->where('car_estado',1);
            $query_1=$this->db_my->get('cargo');
            $this->db_pg->select(" 'Movil Tour' as empresa, car_id , car_descripcion",FALSE);
            $this->db_pg->where('car_estado',1);
            $query_2=$this->db_pg->get('cargo');

            $query=array_merge($query_1->result(),$query_2->result());
            return $query;
            
        }

        function selectId($id){
            $this->db->where('car_id',$id);
            $query=$this->db->get('cargo');
            return $query;
       
        }

        function crear($data){
            $datos=array(
                        'car_descripcion' => $data['descripcion'],
                        'car_estado' => 1 );
            if($data['empresa']==1){
                $this->db_my->insert('cargo',$datos);
            }else if($data['empresa']==2){
                $this->db_pg->insert('cargo',$datos);
            }

            
        }

        function editar($data){
            $datos=array('ter_descripcion' => $data['descripcion'],
                        'ter_direccion' => $data['direccion'],
                        'ter_ciudad' => $data['ciudad']
                        );
            $this->db->where('ter_id',$data['id']);
            $query=$this->db->update('terminal',$datos);
            return $query;
        }

        function eliminar($id){
            $datos=array('ter_estado' => 0   );
            $this->db->where('ter_id',$id);
            $query=$this->db->update('terminal',$datos);
            return $query;
        }

    }
?>