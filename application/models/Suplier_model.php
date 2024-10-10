<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suplier_model extends CI_Model {

    // Function to insert a new supplier into the database
    public function insert_supplier($data) {
        return $this->db->insert('suppliers', $data);
    }
    public function get_details() {
        $this->db->select('*');
        $this->db->from('suppliers');  // Corrected line: use `$this->db->from()`

        return $this->db->get()->result(); // Corrected line: add a semicolon
    }
    public function get_supplier_by_id($id) {
    return $this->db->get_where('suppliers', array('supplier_id' => $id))->row();
}

public function update_supplier($supplier_id, $data) {
    $this->db->where('supplier_id', $supplier_id);
    return $this->db->update('suppliers', $data);
}
public function delete_supplier($id) {
    $this->db->where('supplier_id', $id);
    return $this->db->delete('suppliers');
}


   

}
