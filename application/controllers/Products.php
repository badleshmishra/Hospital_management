<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

	private $photo_path = 'images/design/';

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Category_model');
		$this->load->model('Product_model');
		$this->load->model('City_model');
	}

	public function index($design_category_slug = null)
	{
		$data=array();
		$data['base_url']=$this->config->item('base_url');
		$data['header_design_category_result']=$this->Category_model->read()->result();
		$data['header_city_result']=$this->City_model->read()->result();

		if (isset($design_category_slug)) {

			// == conditions
			$condition_c=array();
	        $condition_c['design_category_slug']=$design_category_slug;
	        $c_data['design_category_row'] = $this->Category_model->read($condition_c)->row();

	        
	        $data['photo_path'] = $this->photo_path;
	        $data['design_category_slug'] = $design_category_slug . "/";
	        $data['design_category_name'] = $c_data['design_category_row']->design_category_name;

			$data['main_content']='products';

	        // getting product as per category slug
			// == conditions
			$condition_p=array();
	        $condition_p['design_category_id']=$c_data['design_category_row']->design_category_id;
	        $data['design_products_result'] = $this->Product_model->read($condition_p)->result();
		}
		else{
			$data['main_content']='home';
			$data['result']=$this->Category_model->read()->result();
		}

		$this->load->view('common/template',$data);
	}

	public function info($design_category_slug = null , $design_slug = null)
	{
		// == conditions
		$condition_c=array();
        $condition_c['design_category_slug']=$design_category_slug;
        $c_data['design_category_row'] = $this->Category_model->read($condition_c)->row();

		$data=array();
		$data['main_content']='product-info';
		$data['header_design_category_result']=$this->Category_model->read()->result();
		$data['header_city_result']=$this->City_model->read()->result();
		$data['base_url']=$this->config->item('base_url');
		$data['photo_path'] = $this->photo_path;
		$data['design_category_slug'] = $design_category_slug . "/";
		$data['design_category_name'] = $c_data['design_category_row']->design_category_name;

		

		// == conditions
        $condition_p=array();
	    $condition_p['design_category_id'] = $c_data['design_category_row']->design_category_id;
	    $condition_p['design_slug'] = $design_slug;
		$data['design_product_info'] = $this->Product_model->read($condition_p)->row();	

		$this->load->view('common/template',$data);
	}

}

/* End of file Interior-design-ideas.php */
/* Location: ./application/controllers/Interior-design-ideas.php */ ?>