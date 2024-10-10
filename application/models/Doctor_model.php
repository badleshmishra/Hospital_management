<?php
defined("BASEPATH") or exit("No direct script access allowed");

class Doctor_model extends CI_Model
{
    // Fetch doctor details based on user ID
    public function get_doctor_info($user_id = null, $doctor_id = null)
    {
        // Debug for troubleshooting

        // Start building the query
        $this->db->select("doctors.*, specialties.specialty_name"); // Select doctor details and the specialty name
        $this->db->from("doctors");
        $this->db->join(
            "specialties",
            "doctors.specialty_id = specialties.specialty_id"
        ); // Assuming 'specialty_id' is the primary key in 'specialties'

        // Check if user_id is provided
        if ($user_id !== null) {
            $this->db->where("doctors.user_id", $user_id);
        }
        // Check if doctor_id is provided
        elseif ($doctor_id !== null) {
            $this->db->where("doctors.doctor_id", $doctor_id); // Assuming 'doctor_id' is a column in 'doctors'
        }
        // If neither is provided, return false
        else {
            return false;
        }

        // Execute the query
        $query = $this->db->get();

        // Return the result row if found, else return false
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function update($data)
    {
        // Check if 'image' exists in data to perform update operation
        if (isset($data["image"])) {
            // If image is being updated, include it in the update query
            $this->db->set("profile_image", $data["image"]);
        }

        // Set the other fields
        $this->db->set("doctor_name", $data["first_name"]);
        // $this->db->set('age', $data['age']);
        // $this->db->set('specialty_name', $data['specialty_name']);
        $this->db->set("phone", $data["phone"]);
        $this->db->set("email", $data["email"]);
        $this->db->set("gender", $data["gender"]);
        // $this->db->set('about_doctor', $data['about_doctor']);
        // $this->db->set('address', $data['address']);

        // Assuming you have a 'doctor_id' to identify which doctor to update
        $this->db->where("doctor_id", $data["doctor_id"]);

        // Execute the update
        return $this->db->update("doctors"); // 'doctors' is the table name
    }
}
