<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    /**
    * 
    */
    class Home extends CI_Controller
    {
        var $menu;

        public function index()
        {   

            $this->load->view("/layout/header.php");
            $this->load->view("home");
            $this->load->view("/layout/foother.php");

            
            
        }

    }
 ?>