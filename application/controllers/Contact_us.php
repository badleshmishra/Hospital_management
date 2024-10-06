<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_us extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Contact_model');
	}

	public function index()
	{
		$data=array();
		$data['main_content']='contact-us';
		$data['header_result']=$this->Category_model->read()->result();
		$data['base_url']=$this->config->item('base_url');

		$this->load->view('common/template',$data);
	}

	public function reach()
	{
		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$contact_data=array();                  

            foreach($this->input->post() as $key => $value){
                $contact_data[$key] = $value;
            }

            $flag = $this->Contact_model->save($contact_data);

            if ($flag > 0) {
                $this->session->set_flashdata('msg', "Mail has been successfully sent.");
                $this->session->set_flashdata('msg_class', "alert-success");

            } else {
                $this->session->set_flashdata('msg', "Error sending mail. Please try again.");
                $this->session->set_flashdata('msg_class', "alert-danger");
            }

            redirect(base_url('contact-us'));
		}
	}

}


/* End of file Contact_us.php */
/* Location: ./application/controllers/Contact_us.php */ ?>