<?php defined('BASEPATH') OR exit('no direct script access allowed');

class Drug_inventory_model extends CI_Model {

    public function insert_inventory($data) {
        $this->db->insert('drug_inventory', $data);
    }

    public function get_drug(){
        $this->db->select('*');
        $this->db->from('drug_inventory');

        return $this->db->get()->result();
    }
}
