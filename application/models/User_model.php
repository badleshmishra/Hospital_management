<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User_model extends CI_Model {

    
    // Fetch user by username
    public function check_user($username,$password){
       
    $this->db->where('username', $username);
    $this->db->where('password', $password);
    return $this->db->get('users')->row(); // Assuming your users table is named 'users'
}


    // You can add more methods here for user-related operations
    // For example, fetching user by ID or updating user details

    // Fetch user by ID
    public function get_user_by_id($user_id) {
        $this->db->where('id', $user_id);
        $query = $this->db->get('users');

        if ($query->num_rows() == 1) {
            return $query->row(); // Return user data as an object
        } else {
            return false; // User not found
        }
    }

    // Insert new user (for registration if required)
    public function insert_user($data) {
        return $this->db->insert('users', $data);
    }

    // Update user password (e.g., for password reset)
    public function update_password($user_id, $new_password) {
        $this->db->set('password', $new_password);
        $this->db->where('id', $user_id);
        return $this->db->update('users');
    }
}
