<style type="text/css">
    input#doctorInput {
        transition: all 0.3s ease;
    }

    input#doctorInput:focus {
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
            <h3 class="block-title">Doctor Details</h3>
        </div>
        <div class="col-md-6">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="<?= base_url() ?>home">
                        <span class="ti-home"></span>
                    </a>
                </li>
                <li class="breadcrumb-item">Doctors</li>
                <li class="breadcrumb-item active">Doctor Details</li>
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
                        <h1 class="pt-4 text-success">Doctor Details</h1>
                    </div>
                    <div class="col-md-6" align="right">
                        <form action="<?= $base_url ?>receptionist/doctor_details" method="post" onsubmit="checkInput()" class="d-flex align-items-center justify-content-between border rounded shadow-sm" style="background-color: #f8f9fa;">
                            <div class="input-group me-2">
                                <input type="text" id="doctorInput" class="form-control form-control-lg" placeholder="Enter Doctor ID or Name" required>
                            </div>
                            <button type="submit" class="btn btn-success btn-lg">Search</button>
                        </form>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Doctor Name</th>
                                <th>Contact</th>
                                <th>Email</th>
                                <th>Gender</th>
                                <th>Department</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($doctor['details'])): ?>
                                <?php foreach ($doctor['details'] as $detail): ?>
                                    <tr>
                                        <td><?= ($detail['doctor_id']) ?></td>
                                        <td><?= ($detail['doctor_name']) ?></td>
                                        <td><?= ($detail['phone']) ?></td>
                                        <td><?= ($detail['email']) ?></td>
                                        <td><?= ($detail['gender']) ?></td>
                                        <td><?= ($detail['specialty_name']) ?></td>
                                        <td>
                                            <form class="d-inline-block" action="<?= $base_url ?>Doctor/edit_profile" method="post">
                                            <input type="hidden" name="edit_id" value="<?= ($detail['doctor_id']) ?>">
                                            <button type="submit" class="btn btn-success mb-2">
                                                <span class="ti-pencil-alt"></span> Edit Doctor
                                            </button>
                                        </form>

                                        <!-- Delete Doctor Form -->
                                        <form class="d-inline-block" action="<?= $base_url ?>Doctor/delete_doctor" method="post" onsubmit="return confirm('Are you sure you want to delete this doctor?');">
                                            <input type="hidden" name="delete_id" value="<?= ($detail['doctor_id']) ?>">
                                            <button type="submit" class="btn btn-danger mb-2">
                                                <span class="ti-trash"></span> Delete Doctor
                                            </button>
                                        </form>
                                    </td>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <?php foreach ($all_doctors as $detail): ?>
                                    <tr>
                                        <td><?= ($detail['doctor_id']) ?></td>
                                        <td><?= ($detail['doctor_name']) ?></td>
                                        <td><?= ($detail['phone']) ?></td>
                                        <td><?= ($detail['email']) ?></td>
                                        <td><?= ($detail['gender']) ?></td>
                                        <td><?= ($detail['specialty_name']) ?></td>

                                        <td>
    <!-- Edit Doctor Form -->
                                        <form class="d-inline-block" action="<?= $base_url ?>Doctor/edit_profile" method="post">
                                            <input type="hidden" name="edit_id" value="<?= ($detail['doctor_id']) ?>">
                                            <button type="submit" class="btn btn-success mb-2">
                                                <span class="ti-pencil-alt"></span> Edit Doctor
                                            </button>
                                        </form>

                                        <!-- Delete Doctor Form -->
                                        <form class="d-inline-block" action="<?= $base_url ?>receptionist/delete_doctor" method="post" onsubmit="return confirm('Are you sure you want to delete this doctor?');">
                                            <input type="hidden" name="delete_id" value="<?= ($detail['doctor_id']) ?>">
                                            <button type="submit" class="btn btn-danger mb-2">
                                                <span class="ti-trash"></span> Delete Doctor
                                            </button>
                                        </form>
                                    </td>

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
    const inputField = document.getElementById('doctorInput');
    const inputValue = inputField.value;

    if (!isNaN(inputValue) && inputValue.trim() !== '') {
        inputField.name = 'doctor_id';
    } else {
        inputField.name = 'doctor_name';
    }
}
</script>
