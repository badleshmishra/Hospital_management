<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Receptionist_model extends CI_Model {

    public function __construct() {
        parent::__construct(); // Call the Model constructor
    }

    // Insert patient data into the database
    public function insert_patient($data) {
        if ($this->db->insert('patients', $data)) {
            return $this->db->insert_id(); // Return the inserted patient ID
        }
        return false; // Return false on failure
    }


    // Retrieve all doctors from the database
    public function get_doctors() {
        $query = $this->db->get('doctors'); 
        return $query->result_array(); 
    }

    // Fetch doctors based on the selected specialist
    public function fetch_doctors_by_specialist($specialistId) {
        $this->db->select('doctor_id, doctor_name');
        $this->db->from('doctors');
        $this->db->where('specialty_id', $specialistId);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array(); // Return doctors if found
        }
        return []; // Return an empty array if no doctors found
    }

    // Retrieve all specialists from the database
    public function get_specialists() {
        $this->db->select('specialty_id, specialty_name');
        $this->db->from('specialties');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array(); // Return specialists if found
        }
        return []; // Return an empty array if no specialists found
    }
    public function get_doctor_by_id($doctor_id) {
    $this->db->select('room_no');
    $this->db->from('doctors');
    $this->db->where('doctor_id', $doctor_id);
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
        return $query->row_array(); // Return the doctor's details if found
    }
    return null; // Return null if no doctor found
}


public function Patient($patient_id = null, $patient_name = null) {
    $this->db->select('patients.*, doctors.doctor_name ');
    $this->db->from('patients');
    $this->db->join('doctors', 'patients.doctor_id = doctors.doctor_id', 'inner');

    // Check if patient_id is provided
    if ($patient_id) {
        $this->db->where('patients.patient_id', $patient_id);
    }

    // Check if patient_name is provided
    if ($patient_name) {
        $this->db->group_start(); // Start a grouping for the WHERE clause
        $this->db->like('patients.first_name', $patient_name);
        $this->db->or_like('patients.last_name', $patient_name);
        $this->db->group_end(); // End the grouping
    }

    $query = $this->db->get();

    return $query->result_array(); 
}

     public function get_all_specialists() {
        $query = $this->db->get('specialties'); // Adjust if necessary
        return $query->result_array();
    }

    public function add_new_doctor($data) {
        return $this->db->insert('doctors', $data); // Adjust if necessary
    }

    public function get_doctors_by_specialist($specialist_id) {
        $this->db->where('doctor_id', $specialist_id); // Assuming specialist_id is the foreign key
        $query = $this->db->get('doctors'); // Adjust if necessary
        return $query->result_array();
    }


  public function add_new_user($data) {
    $this->db->insert('users', $data);
    return $this->db->insert_id(); // Return the new user ID
}


public function get_all_roles() {
    $query = $this->db->get('specialties'); // Adjust the table name if necessary
    return $query->result_array();
}

public function add_new_inventory_manager($data) {
    return $this->db->insert('inventory_managers', $data); // Adjust the table name if necessary
}

public function add_new_receptionist($data) {
    return $this->db->insert('receptionist', $data); // Adjust the table name if necessary
}
    
    public function get_user_by_email($email) {
    $this->db->where('email', $email);
    $query = $this->db->get('users'); // Adjust if necessary
    return $query->row_array(); // Return a single row
}

  public function Doctor($doctor_id = null, $doctor_name = null) {
    $this->db->select('doctors.*, specialties.specialty_name');
    $this->db->from('doctors');
    $this->db->join('specialties', 'doctors.specialty_id = specialties.specialty_id', 'inner');

    // Check if doctor_id is provided
    if ($doctor_id) {
        $this->db->where('doctors.doctor_id', $doctor_id);
    }

    // Check if doctor_name is provided
    if ($doctor_name) {
        $this->db->group_start(); // Start a grouping for the WHERE clause
        $this->db->like('doctors.doctor_name', $doctor_name);
        $this->db->or_like('doctors.last_name', $doctor_name);
        $this->db->group_end(); // End the grouping
    }

    $query = $this->db->get();

    return $query->result_array();
}

  public function deleteDoctor($doctor_id)
{
    // Ensure the doctor ID is provided and not empty
    if ($doctor_id) {
        // Attempt to delete the doctor from the database
        $this->db->where('doctor_id', $doctor_id);
        return $this->db->delete('doctors'); // Assuming your table is named 'doctors'
    }

    return false;
}



}
