<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Drug_department_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    public function insert_department($data) {
        return $this->db->insert('drug_department_allocation', $data);
    }
}
