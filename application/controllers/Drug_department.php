<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Drug_department extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load the model
       // $this->load->model('Drug_department_model');
    }

    public function index() {
        $data = array();
        $data['base_url'] = $this->config->item('base_url');
        $data['main_content'] = 'drug_department/view';

        $this->load->view('common/template', $data);
    }

    public function add_department() {
        // Check if form is submitted
        if ($this->input->post()) {
            // Prepare data for insertion
            $data = array(
                'patient_id' => $this->input->post('patient_id'),
                'drug_name' => $this->input->post('drug_name'),
                'department_name' => $this->input->post('department_name'),
                'quantity_allocated' => $this->input->post('quantity_allocated'),
                'remaining_quantity' => $this->input->post('remaining_quantity'),
                'allocated_by' => $this->input->post('allocated_by'),
                'allocation_date' => $this->input->post('allocation_date'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            );

            
            $this->Drug_department_model->insert_department($data);

            
            redirect('Drug_department');
        } else {
        
            $data['base_url'] = $this->config->item('base_url');
            $data['main_content'] = 'drug_department/add';

            $this->load->view('common/template', $data);
        }
    }
}
