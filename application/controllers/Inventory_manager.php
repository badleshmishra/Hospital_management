<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory_manager extends CI_Controller {

   
    public function index() {
//die(print_r($this->session->userdata(), true));
        // Inventory manager's dashboard view
        $data=array();
        $data['main_content'] = 'inventory_manager/dashboard';
        $this->load->view('common/template', $data);
    }

    // Additional methods for inventory management can be added here
}
