<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory_manager extends CI_Controller {

    public function __construct() {
        //$this->required_role = 'inventory_manager';  // Set role required for this controller
        parent::__construct();  // Call parent's constructor for session and role check
    }

    public function index() {
        // Inventory manager's dashboard view
        $data=array();
        $data['main_content'] = 'inventory/dashboard';
        $this->load->view('common/template', $data);
    }

    // Additional methods for inventory management can be added here
}
