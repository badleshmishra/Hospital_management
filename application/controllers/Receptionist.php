<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Receptionist extends CI_Controller {
    public function __construct() {
        //$this->required_role = 'receptionist';  // Set role required for this controller
        parent::__construct();  // Call parent's constructor for session and role check
    }

    public function index() {
        // Doctor's dashboard view
        $data['main_content'] = 'receptionist/dashboard';
        $data['base_url']=$this->config->item('base_url');
        $this->load->view('common/template', $data);
    }
}
