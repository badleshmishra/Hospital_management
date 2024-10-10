<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory_manager extends CI_Controller {

<<<<<<< HEAD
    public function __construct() {
        parent::__construct(); // Call parent's constructor for session and role check
        $this->load->model('Inventory_model'); // Load the Inventory model
    }

    public function index() {
        // Redirect to the inventory items view
        redirect('inventory_manager/view_item');
    }

    public function view_item() {
        // Fetch items and load the view
        $data['items'] = $this->Inventory_model->get_all_items(); // Fetch data from model
        $data['base_url'] = $this->config->item('base_url');
        $data['main_content'] = 'inventory/view_item'; // Set the view file
        $this->load->view('common/template', $data); // Load the template
    }

    public function add_item() {
        // Check if the form is submitted
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Prepare data for insertion
            $data = [
                'item_name' => $this->input->post('item_name'),
                'quantity' => $this->input->post('quantity'),
                'added_by' => $this->session->userdata('user_id'), // Assuming user ID is stored in session
                'created_at' => date('Y-m-d H:i:s')
            ];

            // Insert item into the database
            if ($this->Inventory_model->add_item($data)) {
                // Redirect to the inventory items page after insertion
                redirect('inventory_manager/view_item');
            } else {
                // Handle error during insertion
                $data['error'] = 'Could not add item, please try again.';
            }
        }

        // Load the view for adding an item
        $data['base_url'] = $this->config->item('base_url');
        $data['main_content'] = 'inventory/add_item';
=======
   
    public function index() {
//die(print_r($this->session->userdata(), true));
        // Inventory manager's dashboard view
        $data=array();
        $data['main_content'] = 'inventory_manager/dashboard';
>>>>>>> origin/master
        $this->load->view('common/template', $data);
    }

   
    public function update_quantity() {
        // Check if the form is submitted
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $inventory_id = $this->input->post('inventory_id');
            $quantity = $this->input->post('quantity');

            // Prepare data for updating
            $update_data = [
                'quantity' => $quantity,
                'updated_by' => $this->session->userdata('user_id'), // Assuming user ID is stored in session
                'updated_at' => date('Y-m-d H:i:s')
            ];

            // Update item in the database
            if ($this->Inventory_model->update_item($inventory_id, $update_data)) {
                // Redirect to the inventory items page after successful update
                redirect('inventory_manager/view_item');
            } else {
                // Handle error during update
                $data['error'] = 'Could not update item, please try again.';
            }
        } else {
            // Handle invalid request
            show_404();
        }
    }

    public function delete_item($inventory_id) {
        // Delete the item from the database
        if ($this->Inventory_model->delete_item($inventory_id)) {
            // Redirect to the inventory items page after deletion
            redirect('inventory_manager/view_item');
        } else {
            // Handle error, item not deleted
            $data['error'] = 'Could not delete item, please try again.';
            // Optionally load a view to show the error
        }
    }
}
