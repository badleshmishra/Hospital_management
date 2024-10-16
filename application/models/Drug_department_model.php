<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Drug_department_model extends CI_Model {
    
    // Insert data into drug_department_allocation table
    public function insert_department($data) {
        return $this->db->insert('drug_department_allocation', $data);
    }

    public function get_drug() {
        // Get allocation data with patient details and total quantities
        $this->db->select('d.*, p.first_name, p.last_name, i.current_quantity as total_quantity');
        $this->db->from('drug_department_allocation d');
        $this->db->join('patients p', 'd.patient_id = p.patient_id', 'left');
        $this->db->join('drug_inventory i', 'd.drug_name = i.drug_name', 'left'); // Join with drug_inventory to get total quantity
        $query = $this->db->get(); 
        return $query->result(); 
    }
}
