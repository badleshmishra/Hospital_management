<style>
    #calendar {
        max-width: 550px; /* Set maximum width to fit the container */
        height: 550px; /* Adjust the height according to your preference */
        margin: 0 auto; /* Center the calendar horizontally */
    }
</style>

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
          
                        <div class="form-group col-md-6">
                            <label for="appointment_date">Appointment Date</label>
                            <input type="hidden" id="appointment_date" name="appointment_date" class="form-control" required> <!-- Hidden input to store selected date -->
                            <div id="calendar"></div> <!-- Calendar will be displayed here -->
                        </div>

                        <!-- Include FullCalendar CSS and JS -->
                        <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css" rel="stylesheet" />
                        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js"></script>

                        <!-- Include jQuery for AJAX requests -->
                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                        
                        <div class="form-group col-md-6">
                            <label for="appointment_time">Appointment Time</label>
                            <input type="time" name="appointment_time" class="form-control" id="appointment_time" required>
                        </div>

                        <div id="appointmentsContainer">
                            <h3>Appointments</h3>
                            <ul id="appointmentsList"></ul>
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
                    // Fetch appointments for the selected doctor
                    fetchAppointments(doctorId);
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error: ' + status + ' - ' + error);
                }
            });
        } else {
            $('#room_number').val(''); // Clear room number if no doctor is selected
            clearCalendar(); // Clear appointments from calendar
        }
    });

    function fetchAppointments(doctorId) {
        // Fetch booked appointments from the backend based on selected doctor
        $.ajax({
            url: '<?php echo base_url("receptionist/get_booked_appointments"); ?>',
            method: 'POST',
            data: { doctor_id: doctorId },
            success: function(data) {
                var events = JSON.parse(data);
                // Render the events in the calendar
                calendar.removeAllEvents(); // Clear previous events
                calendar.addEventSource(events); // Add new events
            },
            error: function() {
                alert('Error fetching appointments.');
            }
        });
    }

    function clearCalendar() {
        calendar.removeAllEvents(); // Clear appointments from calendar
    }

    // FullCalendar initialization
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        selectable: true,
        dateClick: function(info) {
            var selectedDate = info.dateStr;
            // Set the selected date in the hidden input field
            document.getElementById('appointment_date').value = selectedDate;
            alert('You have selected ' + selectedDate);
        },
    });

    calendar.render();
});
</script>
