<?php defined('BASEPATH') OR exit('no direct script access allowed');

class Drug_inventory extends CI_Controller{

	public function __construct(){
		parent::__construct();
		//$this->load->model('Drug_inventory_model');
	}

	public function index(){

		$data = array();

		$data['base_url'] = $this->config->item('base_url');
		$data['main_content'] = 'drug_inventory/view';
		$this->load->view('common/template',$data);
	}
}