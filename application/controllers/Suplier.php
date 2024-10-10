<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suplier extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Suplier_model'); // Load the correct model
    }

    // Index method to display the supplier view
    public function index() {
        $data = array();
        $data['supl'] = $this->Suplier_model->get_details();  
        $data['base_url'] = $this->config->item('base_url');
        $data['main_content'] = 'suplier/view'; // Load the correct view file
        $this->load->view('common/template', $data); // Load the template and pass data
    }

    public function store() {
        // Check if form is submitted
        if ($this->input->post()) {
            // Form data
            $data = array(
                'supplier_name'   => $this->input->post('supplier_name'),
                'contact_person'  => $this->input->post('contact_person'),
                'contact_phone'   => $this->input->post('contact_phone'),
                'address'         => $this->input->post('address'),
                'email'           => $this->input->post('email')
            );

            // Insert supplier data into the database
            if ($this->Suplier_model->insert_supplier($data)) {
                echo "Supplier added successfully!";
            } else {
                echo "Failed to add supplier.";
            }
            redirect("suplier");
        }

        // Load view after processing
        $data = array();  
        $data['base_url'] = $this->config->item('base_url');
        $data['main_content'] = 'suplier/add'; // Assuming 'supplier/add' is your view file
        $this->load->view('common/template', $data); // Load the template view
    }

  public function edit() {
    // Get supplier_id from the GET request
    $supplier_id = $this->input->get('supplier_id');

    // Fetch supplier details by ID to populate the form
    $data['supplier'] = $this->Suplier_model->get_supplier_by_id($supplier_id);

    // Check if supplier data was found
    if (!$data['supplier']) {
        show_404(); // Show a 404 error if supplier not found
        return; // Ensure no further execution
    }

    $data['base_url'] = $this->config->item('base_url');
    $data['main_content'] = 'suplier/suplier_info'; // Load the view file for editing the supplier
    $this->load->view('common/template', $data);
}
 public function update() {
    // Check if the form is submitted
    if ($this->input->post()) {
        // Form data
        $supplier_id = $this->input->post('supplier_id');
        $data = array(
            'supplier_name'   => $this->input->post('supplier_name'),
            'contact_person'  => $this->input->post('contact_person'),
            'contact_phone'   => $this->input->post('contact_phone'),
            'address'         => $this->input->post('address'),
            'email'           => $this->input->post('email')
        );

        // Update supplier data in the database
        if ($this->Suplier_model->update_supplier($supplier_id, $data)) {
            $this->session->set_flashdata('success', 'Supplier updated successfully!');
        } else {
            $this->session->set_flashdata('error', 'Failed to update supplier.');
        }
        redirect("suplier");
    }
}

    public function delete($id) {
        if ($this->Suplier_model->delete_supplier($id)) {
            echo "Supplier deleted successfully!";
        } else {
            echo "Failed to delete supplier.";
        }
        redirect("suplier");
    }
}
