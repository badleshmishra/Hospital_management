<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->load->model('Category_model');
		// $this->load->model('City_model');
	}

	public function index()
	{
		// Dump session data to see what's stored
		//var_dump($this->session->all_userdata());


		$data=array();
		$data['main_content']='home';
		$data['base_url']=$this->config->item('base_url');
		$this->load->view('common/template',$data);

		// $data['result']=$this->Category_model->read()->result();
		// $data['header_design_category_result']=$this->Category_model->read()->result();
		// $data['header_city_result']=$this->City_model->read()->result();

	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */ ?>