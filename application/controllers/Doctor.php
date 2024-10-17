<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


class Doctor extends CI_Controller {

    public function __construct() {

        parent::__construct();  // Call parent's constructor for session and role check

         if ($this->session->userdata('role') !== 'doctor') {
    // Redirect to the login page if the role is not doctor
    redirect('login');  // Adjust 'login' to your actual login route
}

        //$this->required_role = 'doctor';  // Set role required for this controller
         $this->load->model('Doctor_model');

    }

    public function index($user_id = null) {


        if ($user_id === null) {
            $user_id = $this->session->userdata('user_id'); 
        
        }
        $doctor_details = $this->Doctor_model->get_doctor_info($user_id);

        if ($doctor_details) {
            
            $this->session->set_userdata('doctor_id', $doctor_details->doctor_id);
            
        } else {
            
            echo "Doctor id is not found.";
        }
        

        // Debugging to check if doctor_id is in session
        //var_dump($this->session->userdata('doctor_id'));

        $data = array();
        $doctor_id = $this->session->userdata('doctor_id');
        
        // If doctor_id is not set in session, you can handle this gracefully
        // if (!$doctor_id) {
        //     echo "Doctor ID not set in session.";
        //     return; // or redirect to login
        // }

        $appointment_details = $this->Doctor_model->get_appoitment_info($doctor_id);
        // echo "<pre>";
        // print_r($appointment_details);
        // echo "</pre>";

        if ($appointment_details) {
            $data['details'] = $appointment_details;
        } else {
            echo "Appointment details not found.";
        }

        $data['base_url'] = base_url();
        $data['main_content'] = 'doctor/patient_list';
        $this->load->view('common/template', $data);
    }


    public function get_details($user_id = null) {
        // Check if the user is logged in by checking the 'logged_in' session key
        if (!$this->session->userdata('logged_in')) {
            // If the user is not logged in, redirect to the login page or show an error message
            echo "You must be logged in to view this page.";
            return;
        }

        
        if ($user_id === null) {
            $user_id = $this->session->userdata('user_id'); 
        
        }
        
        $doctor_details = $this->Doctor_model->get_doctor_info($user_id);

        //var_dump($doctor_details->doctor_id);
     //print_r($doctor_details);
        
        $data=array();

        // Check if the doctor details exist
        if ($doctor_details) {
            // Display the doctor details (for simplicity, showing as JSON)
            
            $data['details'] = $doctor_details;
        } else {
            // If not found, show an error message
            echo "Doctor details not found.";
        }

        // Load the profile view
        $data['base_url'] = base_url();
        $data['main_content'] = 'doctor/profile';
        $this->load->view('common/template', $data);
    }

  public function edit()
{
    if ($this->input->server('REQUEST_METHOD') == 'POST') {
        $data = array();
        $data['doctor_id'] = $this->input->post('edit_id');

        if ($data['doctor_id']) {
            // Fetch doctor information
            $data['doctor_info'] = $this->Doctor_model->get_doctor_info(null, $data['doctor_id']);
        } else {
            echo "Doctor ID not found!";
            return;
        }

        $data['main_content'] = 'doctor/edit';
        $data['base_url'] = base_url();
        $this->load->view('common/template', $data);
    } else {
        redirect(base_url('home'));
    }
}



    public function save() {

        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            // Prepare the data array for doctor information
            $data = array(
                'doctor_name' => $this->input->post('doctor_name'),
                'doctor_id' => $this->input->post('doctor_id'),
                'age' => $this->input->post('age'),
                // 'specialty_name' => $this->input->post('specialization'),
                'phone' => $this->input->post('phone'),
                'email' => $this->input->post('email'),
                'gender' => $this->input->post('gender'),
                // 'about_doctor' => $this->input->post('about_doctor'),
                // 'address' => $this->input->post('address'),
            );

            // Load the upload library
            $this->load->library('upload');

            // Define the upload path
            $uploadPath = FCPATH . "/assets/images/";

            // Log the upload path for debugging
            log_message('debug', 'Upload Path: ' . $uploadPath);

            

        // Check if an image file was uploaded
            if (!empty($_FILES['file_upload']['name'])) {
                // Set upload configuration
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'jpg|jpeg|png|gif|avif';
                $config['file_name'] = time() . '_' . $_FILES['file_upload']['name'];
                
                $this->upload->initialize($config);

                // Attempt to upload the file
                if ($this->upload->do_upload('file_upload')) {
                    $uploadData = $this->upload->data();
                    $data['image'] = $uploadData['file_name']; // Store the uploaded image name
                    log_message('debug', 'Image uploaded successfully: ' . $data['image']);
                } else {
                    log_message('error', "Image upload failed: " . $this->upload->display_errors());
                }
            }

        // Update doctor information in the database
            if ($this->Doctor_model->update($data)) {
                $this->session->set_flashdata('msg', "Doctor information updated successfully.");
                $this->session->set_flashdata('msg_class', "alert-success");
            } else {
                $this->session->set_flashdata('msg', "Failed to update doctor information.");
                $this->session->set_flashdata('msg_class', "alert-danger");
            }

             redirect('receptionist/doctor_details');
            }
    }

    



}
