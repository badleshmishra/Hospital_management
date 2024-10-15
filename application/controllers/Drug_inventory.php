<?php defined('BASEPATH') OR exit('no direct script access allowed');

class Drug_inventory extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('Drug_inventory_model');
    }

    public function index(){

        $data = array();
        $data['drug'] = $this->Drug_inventory_model->get_drug(); 
        $data['base_url'] = $this->config->item('base_url');
        $data['main_content'] = 'drug_inventory/view';
        $this->load->view('common/template', $data);
    }

    public function add() {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $data = array(
                'supplier_name' => $this->input->post('supplier_name'),
                'drug_name' => $this->input->post('drug_name'),
                'batch_number' => $this->input->post('batch_number'),
                'received_quantity' => $this->input->post('received_quantity'),
                'current_quantity' => $this->input->post('current_quantity'),
                'expiry_date' => $this->input->post('expiry_date'),
                'received_date' => $this->input->post('received_date'), 
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            );

            // Insert data into drug inventory
            $this->Drug_inventory_model->insert_inventory($data);

            // Redirect after the operation
            redirect('drug_inventory/add');
        } else {
            $data['base_url'] = $this->config->item('base_url');
            $data['main_content'] = 'drug_inventory/add';
            $this->load->view('common/template', $data);
        }
    }
}
