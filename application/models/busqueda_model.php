<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class busqueda_model extends CI_Model{
	    
	    function __construct(){
	        parent::__construct();
	        
           // $this->db_pg=$this->load->database('pgsql',TRUE);
	    }

	    function select(){

	    	$sql="Select";
	    	
	        $query['civa']=$this->db_my->query($sql);
	        //$query['movil']=$this->db_pg->get($sql);
	        return $query;
	        
	    }


	    
	}
?>