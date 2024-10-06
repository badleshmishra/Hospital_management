<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Base extends CI_Controller {
    protected $required_role;

    public function __construct() {
        parent::__construct();

        // Ensure the user is logged in
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }

        // Ensure the user has the correct role
        if ($this->session->userdata('role') !== $this->required_role) {
            redirect('auth/unauthorized'); // Redirect if role does not match
        }
    }
}
