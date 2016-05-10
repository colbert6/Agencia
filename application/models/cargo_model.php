
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Cargo_model extends CI_Model{
        
        function __construct(){
            parent::__construct();
            
           // $this->db_pg=$this->load->database('pgsql',TRUE);
        }

        function select(){
            $this->db_my->where('car_estado',1);
            $query=$this->db_my->get('cargo');
            return $query;
            
        }

        function selectId($id){
            $this->db->where('car_id',$id);
            $query=$this->db->get('cargo');
            return $query;
       
        }

        function crear($data){
            $this->db->insert('cargo',array('car_descripcion' => $data['descripcion'],
                                            'raz_estado' => 1 ));
        }

        function editar($data){
            $datos=array('car_descripcion' => $data['descripcion']
                        );
            $this->db->where('car_id',$data['id']);
            $query=$this->db->update('cargo',$datos);
            return $query;
        }

        function eliminar($id){
            $datos=array('car_estado' => 0   );
            $this->db->where('car_id',$id);
            $query=$this->db->update('cargo',$datos);
            return $query;
        }

    }
?>