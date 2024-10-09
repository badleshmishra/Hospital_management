<!-- Breadcrumb -->
				<!-- Page Title -->
				<div class="container mt-0">
					<div class="row breadcrumb-bar">
						<div class="col-md-6">
							<h3 class="block-title">Edit Doctor</h3>
						</div>
						<div class="col-md-6">
							<ol class="breadcrumb">
								<li class="breadcrumb-item">
									<a href="index.html">
										<span class="ti-home"></span>
									</a>
								</li>
								<li class="breadcrumb-item">Doctors</li>
								<li class="breadcrumb-item active">Edit Doctor</li>
							</ol>
						</div>
					</div>
				</div>
			<!-- /Page Title -->

			<!-- /Breadcrumb -->
			<!-- Main Content -->
			<div class="container">
<?php if ($this->session->flashdata('msg')): ?>
    <div class="alert <?php echo $this->session->flashdata('msg_class'); ?> alert-dismissible fade show" role="alert">
        <strong><?php echo $this->session->flashdata('msg'); ?></strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
<?php endif; ?>
				<div class="row">
					<!-- Widget Item -->
					<div class="col-md-12">
						<div class="widget-area-2 proclinic-box-shadow">
							<h3 class="widget-title">Edit Doctor</h3>
							<form action="<?= $base_url ?>doctor/save" method="post" enctype="multipart/form-data">
							    <div class="form-row">
							        <div class="form-group col-md-6">
							            <label for="Doctor-name">Doctor Name</label>
							            <input type="text" name="first_name" value="<?= $doctor_info->doctor_name ?>" class="form-control" placeholder="Doctor name" id="Doctor-name">
							            <input type="text" name="doctor_id" value="<?= $doctor_info->doctor_id ?>" class="form-control" placeholder="Doctor name" id="Doctor-name">
							        </div>
							        <div class="form-group col-md-6">
							            <label for="dob">Date Of Birth</label>
							            <input type="date" name="date_of_birth" value="<?= $doctor_info->date_of_birth ?>" placeholder="Date of Birth" class="form-control" id="dob">
							        </div>
							        <!-- <div class="form-group col-md-6">
							            <label for="specialization">Specialization</label>
							            <input type="text" name="specialty_name" value="<?= $doctor_info->specialty_name ?>" placeholder="Specialization" class="form-control" id="specialization">
							        </div> -->
							        <!-- <div class="form-group col-md-6">
							            <label for="experience">Experience</label>
							            <input type="text" name="experience" value="<?= $doctor_info->experience ?>" placeholder="Experience" class="form-control" id="experience">
							        </div> -->
							        <!-- <div class="form-group col-md-6">
							            <label for="age">Age</label>
							            <input type="text" name="age" value="<?= $doctor_info->age ?>" placeholder="Age" class="form-control" id="age">
							        </div> -->
							        <div class="form-group col-md-6">
							            <label for="phone">Phone</label>
							            <input type="text" name="phone" value="<?= $doctor_info->phone ?>" placeholder="Phone" class="form-control" id="phone">
							        </div>
							        <div class="form-group col-md-6">
							            <label for="email">Email</label>
							            <input type="email" name="email" value="<?= $doctor_info->email ?>" placeholder="Email" class="form-control" id="Email">
							        </div>
							        <div class="form-group col-md-6">
							            <label for="gender">Gender</label>
							            <select name="gender" class="form-control" id="gender">
							                <option value="Male" <?= $doctor_info->gender === 'Male' ? 'selected' : '' ?>>Male</option>
							                <option value="Female" <?= $doctor_info->gender === 'Female' ? 'selected' : '' ?>>Female</option>
							                <option value="Other" <?= $doctor_info->gender === 'Other' ? 'selected' : '' ?>>Other</option>
							            </select>
							        </div>
							        <!-- <div class="form-group col-md-6">
							            <label for="about-doctor">Doctor Details</label>
							            <textarea name="about" placeholder="Doctor Details" class="form-control" id="about-doctor" rows="3"><?= $doctor_info->about ?></textarea>
							        </div>
							        <div class="form-group col-md-6">
							            <label for="address">Address</label>
							            <textarea name="address" placeholder="Address" class="form-control" id="address" rows="3"><?= $doctor_info->address ?></textarea>
							        </div> -->
							        <div class="form-group col-md-12">
							            <label for="file">File</label>
							            <input type="file" name="file_upload" class="form-control" id="file">
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
							            <button type="submit" class="btn btn-primary btn-lg">Update</button>
							        </div>
							    </div>
							</form>

							<!-- Alerts-->
							<div class="alert alert-success alert-dismissible fade show" role="alert">
								<strong>Updated Successfully!</strong> Please Check in doctors list
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">×</span>
								</button>
							</div>
							<div class="alert alert-warning alert-dismissible fade show" role="alert">
								<strong>Holy guacamole!</strong> You should check in on some of those fields below.
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">×</span>
								</button>
							</div>
							<!-- /Alerts-->
						</div>
					</div>
					<!-- /Widget Item -->
				</div>
			</div>
			<!-- /Main Content -->