<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Terminal_model extends CI_Model{
	    
	    function __construct(){
	        parent::__construct();
	        
           // $this->db_pg=$this->load->database('pgsql',TRUE);
	    }

	    function select(){
	    	$this->db_my->where('ter_estado',1);
	        $query=$this->db_my->get('terminal');
	        return $query;
	        
	    }

	    function selectId($id){
	        $this->db->where('ter_id',$id);
	        $query=$this->db->get('terminal');
	        return $query;
	   
	    }

	    function crear($data){
	        $this->db->insert('terminal',array('ter_dni' => $data['dni'],
	        								'ter_descripcion' => $data['descripcion'],
	        								'ter_direccion' => $data['direccion'],
	        								'ter_ciudad' => $data['ciudad'],
	        								'raz_estado' => 1 ));
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