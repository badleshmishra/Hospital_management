<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // Insert a new item into the database
    public function add_item($data) {
        return $this->db->insert('inventory', $data); // Ensure 'inventory' matches your actual table name
    }

    // Fetch all items (for dashboard)
    public function get_all_items() {
        return $this->db->get('inventory')->result(); // Retrieve all items from the 'inventory' table
    }

    // Update an existing item in the database
    public function update_item($inventory_id, $data) {
        $this->db->where('inventory_id', $inventory_id); // Specify which item to update
        return $this->db->update('inventory', $data); // Update the item in the database
    }

    // Delete an item from the database
    public function delete_item($inventory_id) {
        return $this->db->delete('inventory', ['inventory_id' => $inventory_id]); // Delete the item by ID
    }
}
