<!-- Top Navigation -->
			<div class="container top-brand">
				<nav class="navbar navbar-default">			
					<div class="navbar-header">
						<div class="sidebar-header"> <a href="<?= base_url('home') ?>"><img src="<?= $base_url ?>assets/images/logo-dark.png" class="logo" alt="logo"></a>
						</div>
					</div>
					<ul class="nav justify-content-end">
						<li class="nav-item">
							<a class="nav-link">
								<span title="Fullscreen" class="ti-fullscreen fullscreen"></span>
							</a>							
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="modal" data-target=".proclinic-modal-lg">
								<span class="ti-search"></span>
							</a>
							<div class="modal fade proclinic-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog modal-lorvens">
									<div class="modal-content proclinic-box-shadow2">
										<div class="modal-header">
											<h5 class="modal-title">Search Patient/Doctor:</h5>
											<span class="ti-close" data-dismiss="modal" aria-label="Close">
											</span>
										</div>
										<div class="modal-body">
											<form>
												<div class="form-group">
													<input type="text" class="form-control" id="search-term" placeholder="Type text here">
													<button type="button" class="btn btn-lorvens proclinic-bg">
														<span class="ti-location-arrow"></span> Search</button>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</li>
						<li class="nav-item">
							<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
							 aria-expanded="false">
								<span class="ti-announcement"></span>
							</a>
							<div class="dropdown-menu proclinic-box-shadow2 notifications animated flipInY">
								<h5>Notifications</h5>
								<a class="dropdown-item" href="#">
									<span class="ti-wheelchair"></span> New Patient Added</a>
								<a class="dropdown-item" href="#">
									<span class="ti-money"></span> Patient payment done</a>
								<a class="dropdown-item" href="#">
									<span class="ti-time"></span>Patient Appointment booked</a>
								<a class="dropdown-item" href="#">
									<span class="ti-wheelchair"></span> New Patient Added</a>
							</div>
						</li>
						<li class="nav-item">
							<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
							 aria-expanded="false">
								<span class="ti-user"></span>
							</a>
							<div class="dropdown-menu proclinic-box-shadow2 profile animated flipInY">
								<h5><?= $this->session->userdata('role'); ?></h5>

								
								<a class="dropdown-item" href="#">
									<span class="ti-settings"></span> Settings</a>
								<a class="dropdown-item" href="#">
									<span class="ti-help-alt"></span> Help</a>
								<?php if ($this->session->userdata('logged_in')): ?>
							    <a class="dropdown-item" href="<?= base_url('logout') ?>">
							        <span class="ti-power-off"></span> Logout
							    </a>
							<?php else: ?>
							    <a class="dropdown-item" href="<?= base_url('login') ?>">
							        <span class="ti-power-off"></span> Login
							    </a>
							<?php endif; ?>

							</div>`
						</li>
					</ul>
			
				</nav>
			</div>
			<!-- /Top Navigation -->
			<!-- Menu -->
			<div class="container menu-nav">
				<nav class="navbar navbar-expand-lg proclinic-bg text-white">
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="ti-menu text-white"></span>
					</button>
			
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
					    <ul class="navbar-nav mr-auto">
					        <?php 
					        if ($this->session->userdata('logged_in')) {
					            // Redirect to the appropriate controller based on the role
					            if ($this->session->userdata('role') === 'doctor') {
					                ?>
					                <li class="nav-item dropdown active">
					                    <a class="nav-link dropdown-toggle"  href="<?= base_url('home') ?>" role="button" aria-haspopup="true"
					                    aria-expanded="false"><span class="ti-home"></span> Dashboard</a>
					                    
					                </li>
					                <li class="nav-item dropdown">
					                    <a class="nav-link dropdown-toggle"  href="<?= base_url('doctor') ?>" role="button" aria-haspopup="true"
					                    aria-expanded="false"><i class="fa fa-address-book"></i> Patients</a>
					                </li>
					                <li class="nav-item dropdown ">
					                    <a class="nav-link dropdown-toggle"  href="<?= base_url('Doctor/profile') ?>" role="button" aria-haspopup="true"
					                    aria-expanded="false"><span class="ti-user"></span> Profile</a>
					                    
					                </li>
					                <?php 
					            } elseif ($this->session->userdata('role') === 'receptionist') { ?>
					                <li class="nav-item dropdown active">
					                    <a class="nav-link dropdown-toggle"  href="<?= base_url('home') ?>" role="button" aria-haspopup="true"
					                    aria-expanded="false"><span class="ti-home"></span> Dashboard</a>
					                    
					                </li>
					                <li class="nav-item dropdown">
					                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
					                    aria-expanded="false"><span class="ti-wheelchair"></span> Patients</a>
					                    <div class="dropdown-menu">
					                        <a class="dropdown-item" href="add-patient.html">Add Patient</a>
					                        <a class="dropdown-item" href="patients.html">All Patients</a>
					                        <a class="dropdown-item" href="about-patient.html">Patient Details</a>
					                        <a class="dropdown-item" href="edit-patient.html">Edit Patient</a>
					                    </div>
					                </li>
					                <li class="nav-item dropdown">
					                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
					                    aria-expanded="false"><span class="ti-user"></span> Doctors</a>
					                    <div class="dropdown-menu">
					                        <a class="dropdown-item" href="add-doctor.html">Add Doctor</a>
					                        <a class="dropdown-item" href="doctors.html">All Doctors</a>
					                        <a class="dropdown-item" href="about-doctor.html">Doctor Details</a>
					                        <a class="dropdown-item" href="edit-doctor.html">Edit Doctor</a>
					                    </div>
					                </li>
					                <li class="nav-item dropdown">
					                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
					                    aria-expanded="false"><span class="ti-pencil-alt"></span> Appointments</a>
					                    <div class="dropdown-menu">
					                        <a class="dropdown-item" href="add-appointment.html">Add Appointment</a>
					                        <a class="dropdown-item" href="appointments.html">All Appointments</a>
					                        <a class="dropdown-item" href="about-appointment.html">Appointment Details</a>
					                        <a class="dropdown-item" href="edit-appointment.html">Edit Appointment</a>
					                    </div>
					                </li>
					                <li class="nav-item dropdown">
					                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
					                    aria-expanded="false"><span class="ti-money"></span> Payments</a>
					                    <div class="dropdown-menu">
					                        <a class="dropdown-item" href="add-payment.html">Add Payment</a>
					                        <a class="dropdown-item" href="payments.html">All Payments</a>
					                        <a class="dropdown-item" href="about-payment.html">Payment Invoice</a>
					                    </div>
					                </li>
					            <?php 
					            } elseif ($this->session->userdata('role') === 'inventory_manager') {
					                redirect('inventory_manager');
					            }
					        } else {
					           echo "plz login to view details";
					        }
					        ?>
					    </ul> <!-- Closing the ul -->
					</div> <!-- Closing the collapse navbar-collapse -->
				</nav>
			</div>
			<!-- /Menu -->
			<!-- Breadcrumb -->
			<!-- Page Title -->
			<!-- <div class="container mt-0">
				<div class="row breadcrumb-bar">
					<div class="col-md-6">
						<h3 class="block-title">Quick Statistics</h3>
					</div>
					<div class="col-md-6">
						<ol class="breadcrumb">
							<li class="breadcrumb-item">
								<a href="index.html">
									<span class="ti-home"></span>
								</a>
							</li>
							<li class="breadcrumb-item active">Dashboard</li>
						</ol>
					</div>
				</div>
			</div> -->
			<!-- /Page Title -->
			<!-- /Breadcrumb -->