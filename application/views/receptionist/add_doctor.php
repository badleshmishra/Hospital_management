<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="widget-area-2 proclinic-box-shadow">
                <h3 class="widget-title">Add Doctor</h3>
                
                <!-- Display validation errors -->
                <?php echo validation_errors(); ?>
                
                <!-- Display success/error messages -->
                <?php if ($this->session->flashdata('success')): ?>
                    <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
                <?php endif; ?>
                <?php if ($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
                <?php endif; ?>
                
                <!-- Form for doctor details -->
                <form id="doctorForm" action="<?php echo base_url('receptionist/add_doctor'); ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="doctor-name">Name</label>
                            <input type="text" class="form-control" name="doctor_name" placeholder="First Name" id="doctor-name" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="last-name">Last Name</label>
                            <input type="text" class="form-control" name="last_name" placeholder="Last Name" id="last-name" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" id="password" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="role">Role</label>
                            <select name="role" class="form-control" id="role" required>
                                <option >Select a Role</option>
                                <option value="doctor">Doctor</option>
                                <option value="receptionist">Receptionist</option>
                                <option value="inventory_manager">Inventory Manager</option>
                            </select>
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

                        <!-- Specialist selection -->
                        <div class="form-group col-md-6" id="specialist-container" style="display:none;">
                            <label for="specialist">Specialist</label>
                            <select name="specialist_id" class="form-control" id="specialist">
                                <option value="">Select a Specialist</option>
                                <?php foreach ($specialists as $specialist): ?>
                                    <option value="<?php echo $specialist['specialty_id']; ?>">
                                        <?php echo $specialist['specialty_name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <!-- Room Number field -->
                        <div class="form-group col-md-6" id="room-number-container" style="display:none;">
                            <label for="room-number">Room Number</label>
                            <input type="text" name="room_no" class="form-control" id="room-number" placeholder="Room Number">
                        </div>

                        <div class="form-group col-md-6">
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
<script>
$(document).ready(function() {
    $('#role').change(function() {
        const selectedRole = $(this).val();
        
        if (selectedRole === 'doctor') {
            $('#specialist-container').show();
            $('#room-number-container').show();
        } else {
            $('#specialist-container').hide();
            $('#room-number-container').hide();
            $('#specialist').val(null); // Reset specialist selection
        }
    });
});
</script>
