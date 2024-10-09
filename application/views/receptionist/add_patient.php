<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="widget-area-2 proclinic-box-shadow">
                <h3 class="widget-title">Add Patient</h3>
                <!-- Display validation errors -->
                <?php echo validation_errors(); ?>
                
                <!-- Display success/error messages -->
                <?php if ($this->session->flashdata('success')): ?>
                    <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
                <?php endif; ?>
                <?php if ($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
                <?php endif; ?>
                
                <!-- Form for patient details -->
                <form id="patientForm" action="<?php echo base_url('receptionist/add_patient'); ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-row">


                        <div class="form-group col-md-6">
                            <label for="patient-name">Patient Name</label>
                            <input type="text" class="form-control" name="first_name" placeholder="Patient name" id="patient-name" required>
                        </div>
                    <!--     <div class="form-group col-md-6">
                            <label for="dob">Date Of Birth</label>
                            <input type="date" name="dob" class="form-control" id="dob" required>
                        </div> -->
                        <div class="form-group col-md-6">
                            <label for="age">Age</label>
                            <input type="text" name="age" class="form-control" id="age" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" class="form-control" id="phone" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="gender">Gender</label>
                            <select name="gender" class="form-control" id="gender">
                                <option>Male</option>
                                <option>Female</option>
                                <option>Other</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" id="email" required>
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label for="specialist">Specialist</label>
                            <select name="specialist_id" class="form-control" id="specialist" required>
                                <option value="">Select a Specialist</option>
                                <?php foreach ($specialists as $specialist): ?>
                                    <option value="<?php echo $specialist['specialty_id']; ?>" <?php echo isset($selected_specialist) && $selected_specialist == $specialist['specialty_id'] ? 'selected' : ''; ?>>
                                        <?php echo $specialist['specialty_name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="doctor">Doctor</label>
                            <select name="doctor_id" class="form-control" id="doctor" required>
                                <option value="">Select a Doctor</option>
                                <?php if (isset($doctors) && !empty($doctors)): ?>
                                    <?php foreach ($doctors as $doctor): ?>
                                        <option value="<?php echo $doctor['doctor_id']; ?>" <?php echo isset($selected_doctor) && $selected_doctor == $doctor['doctor_id'] ? 'selected' : ''; ?>>
                                            <?php echo $doctor['doctor_name']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="room_number">Room Number</label>
                            <input type="text" name="room_no" class="form-control" id="room_number" value="<?php echo isset($room_number) ? $room_number : ''; ?>" readonly>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="address">Address</label>
                            <textarea name="address" class="form-control" id="address" rows="3" required></textarea>
                        </div>
                        <div class="form-check col-md-12 mb-2">
                            <div class="text-left">
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" id="ex-check-2" required>
                                    <label class="custom-control-label" for="ex-check-2">Please Confirm</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6 mb-3">
                            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#specialist').change(function() {
        let specialistId = $(this).val();
        
        // Fetch doctors based on selected specialist
        $.ajax({
            url: '<?php echo base_url("receptionist/add_patient"); ?>',
            type: 'POST',
            data: { specialist_id: specialistId },
            dataType: 'json',
            success: function(response) {
                $('#doctor').empty().append('<option value="">Select a Doctor</option>');
                if (response.doctors && response.doctors.length > 0) {
                    $.each(response.doctors, function(index, doctor) {
                        $('#doctor').append('<option value="'+doctor.doctor_id+'">'+doctor.doctor_name+'</option>');
                    });
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error: ' + status + ' - ' + error);
            }
        });
    });

    $('#doctor').change(function() {
        let doctorId = $(this).val();
        
        // Fetch room number based on selected doctor
        if (doctorId) {
            $.ajax({
                url: '<?php echo base_url("receptionist/add_patient"); ?>',
                type: 'POST',
                data: { doctor_id: doctorId },
                dataType: 'json',
                success: function(response) {
                    if (response.room_number) {
                        $('#room_number').val(response.room_number);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error: ' + status + ' - ' + error);
                }
            });
        } else {
            $('#room_number').val(''); // Clear room number if no doctor is selected
        }
    });
});

</script>