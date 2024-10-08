	<style type="text/css">
     input#patientInput {
    transition: all 0.3s ease;
}

input#patientInput:focus {
    border-color: #28a745; /* Change border color on focus */
    box-shadow: 0 0 5px rgba(40, 167, 69, 0.5); /* Add shadow on focus */

}

.btn-success {
    padding: 5px 20px; /* Increase button padding */
    font-size: 1.1rem; /* Increase font size */
    transition: background-color 0.3s ease, transform 0.3s ease; /* Smooth transition */
}

.btn-success:hover {
    background-color: #218838; /* Darken on hover */
    transform: translateY(-2px); /* Slight lift effect */
}
   
    </style>

    			<div class="container mt-0">
					<div class="row breadcrumb-bar">
				<div class="col-md-6">
					<h3 class="block-title">Patient Details</h3>
				</div>
				<div class="col-md-6">
					<ol class="breadcrumb">						
						<li class="breadcrumb-item">
							<a href="<?= base_url() ?>home">
								<span class="ti-home"></span>
							</a>
                        </li>
                        <li class="breadcrumb-item">Patients</li>
						<li class="breadcrumb-item active">Patient Details</li>
					</ol>
				</div>
			</div>
			</div>
			<!-- /Page Title -->

			<!-- /Breadcrumb -->
			<!-- Main Content -->

			<div class="container">





   
    <?php if ($this->session->flashdata('message')): ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Warning!</strong> <?= $this->session->flashdata('message'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
<?php endif; ?>


    <div class="row">
        <div class="col-md-12">
            <div class="widget-area-2 proclinic-box-shadow">
                <div class="row">
                    <div class="col-6">
                        
                <h1 class="pt-4 text-success">Patient Details</h1>
                    </div>
                    <div class="col-md-6" align="right">
                                       <form action="<?= $base_url ?>receptionist/patient_details" method="post" onsubmit="checkInput()" class="d-flex align-items-center justify-content-between  border rounded shadow-sm" style="background-color: #f8f9fa;">
                    <div class="input-group me-2">
                        <input type="text" id="patientInput" class="form-control form-control-lg" placeholder="Enter Patient ID or Name" required>
                    </div>
                    <button type="submit" class="btn btn-success btn-lg">Search</button>
                </form>

                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Doctor Name</th>
                                <th>Contact</th>
                                <th>Gender</th>
                                <th>Age</th>
                                <th>Email</th>
                                <th>Doctor name</th>
                            </tr>
                        </thead>
                      <tbody>
    <?php if (!empty($patient['details'])): ?>
        <?php foreach ($patient['details'] as $detail): ?>
            <tr>
                <td><?= ($detail['patient_id']) ?></td>
                <td><?= ($detail['first_name']) ?></td>
                <td><?= ($detail['phone']) ?></td>
                <td><?= ($detail['gender']) ?></td>
                <td><?= ($detail['age']) ?></td>
                <td><?= ($detail['email']) ?></td>
                <td><?= ($detail['doctor_name']) ?></td>
                <!-- Uncomment and adjust these if you want to display additional information -->
                <!-- <td><?= date('d-m-Y', strtotime($detail['visit_date'])) ?></td>
                <td><?= ($detail['status']) ?></td> -->
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
 <?php foreach ($all_patients as $detail): ?>
            <tr>
                <td><?= ($detail['patient_id']) ?></td>
                <td><?= ($detail['first_name']) ?></td>
                <td><?= ($detail['phone']) ?></td>
                <td><?= ($detail['gender']) ?></td>
                <td><?= ($detail['age']) ?></td>
                <td><?= ($detail['email']) ?></td>
                <td><?= ($detail['doctor_name']) ?></td>
                <!-- Uncomment and adjust these if you want to display additional information -->
                <!-- <td><?= date('d-m-Y', strtotime($detail['visit_date'])) ?></td>
                <td><?= ($detail['status']) ?></td> -->
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
</tbody>

                    </table>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
function checkInput() {
    const inputField = document.getElementById('patientInput');
    const inputValue = inputField.value;

    if (!isNaN(inputValue) && inputValue.trim() !== '') {
        inputField.name = 'patient_id';
    } else {
        inputField.name = 'patient_name';
    }
}
</script>
