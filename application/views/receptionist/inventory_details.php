<style type="text/css">
    input#itemInput {
        transition: all 0.3s ease;
    }

    input#itemInput:focus {
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
            <h3 class="block-title">Inventory Details</h3>
        </div>
        <div class="col-md-6">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="<?= base_url() ?>home">
                        <span class="ti-home"></span>
                    </a>
                </li>
                <li class="breadcrumb-item">Inventory</li>
                <li class="breadcrumb-item active">Inventory Details</li>
            </ol>
        </div>
    </div>
</div>
<!-- /Page Title -->

<!-- /Breadcrumb -->
<!-- Main Content -->

<div class="container">
    <?php if ($this->session->flashdata('message')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Notice!</strong> <?= $this->session->flashdata('message'); ?>
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
                        <h1 class="pt-4 text-success">Inventory Details</h1>
                    </div>
                    <div class="col-md-6" align="right">
                        <form action="<?= $base_url ?>receptionist/inventory_details" method="post" onsubmit="checkInput()" class="d-flex align-items-center justify-content-between border rounded shadow-sm" style="background-color: #f8f9fa;">
                            <div class="input-group me-2">
                                <input type="text" id="itemInput" class="form-control form-control-lg" placeholder="Enter Item ID or Name" required>
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
                                <th>Item Name</th>
                                <th>phone</th>
                                <th>email</th>
                                <th>address</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($details['details'])): ?>
                                <?php foreach ($details['manger_info'] as $detail): ?>
                                       <tr>
                                        <td><?= ($detail['manager_id']) ?></td>
                                        <td><?= ($detail['manager_name']) ?></td>
                                        <td><?= ($detail['phone']) ?></td>
                                        <td><?= ($detail['email']) ?></td>
                                        <td><?= ($detail['address']) ?></td>
                                        <td>
                                            <form class="d-inline-block" action="<?= $base_url ?>receptionist/edit" method="post">
                                                <input type="text" name="edit_id" value="<?= ($detail['manager_id']) ?>">
                                                <button type="submit" class="btn btn-success mb-2">
                                                    <span class="ti-pencil-alt"></span> Edit
                                                </button>
                                            </form>

                                            <!-- Delete Item Form -->
                                            <form class="d-inline-block" action="<?= $base_url ?>receptionist/delete_item" method="post" onsubmit="return confirm('Are you sure you want to delete this item?');">
                                                <input type="hidden" name="delete_id" value="<?= ($detail['manager_id']) ?>">
                                                <button type="submit" class="btn btn-danger mb-2">
                                                    <span class="ti-trash"></span> Delete 
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <?php foreach ($details as $detail): ?>
                                    <tr>
                                        <td><?= ($detail['manager_id']) ?></td>
                                        <td><?= ($detail['manager_name']) ?></td>
                                        <td><?= ($detail['phone']) ?></td>
                                        <td><?= ($detail['email']) ?></td>
                                        <td><?= ($detail['address']) ?></td>
                                        <td>
                                            <form class="d-inline-block" action="<?= $base_url ?>receptionist/edit" method="post">
                                                <input type="text" name="edit_id" value="<?= ($detail['manager_id']) ?>">
                                                <button type="submit" class="btn btn-success mb-2">
                                                    <span class="ti-pencil-alt"></span> Edit
                                                </button>
                                            </form>

                                            <!-- Delete Item Form -->
                                            <form class="d-inline-block" action="<?= $base_url ?>receptionist/delete_item" method="post" onsubmit="return confirm('Are you sure you want to delete this item?');">
                                                <input type="hidden" name="delete_id" value="<?= ($detail['manager_id']) ?>">
                                                <button type="submit" class="btn btn-danger mb-2">
                                                    <span class="ti-trash"></span> Delete 
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
    const inputField = document.getElementById('itemInput');
    const inputValue = inputField.value;

    if (!isNaN(inputValue) && inputValue.trim() !== '') {
        inputField.name = 'manager_id';
    } else {
        inputField.name = 'manager_name';
    }
}
</script>
