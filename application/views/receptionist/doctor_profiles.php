<!-- Page Title -->
<div class="container mt-0">
    <div class="row breadcrumb-bar">
        <div class="col-md-6">
            <h3 class="block-title">Profile</h3>
        </div>
        <div class="col-md-6">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html">
                        <span class="ti-home"></span>
                    </a>
                </li>
                <li class="breadcrumb-item">Doctors</li>
                <li class="breadcrumb-item active">Profile</li>
            </ol>
        </div>
    </div>
</div>
<!-- /Page Title -->

<?php if ($this->session->flashdata("msg")): ?>
    <div class="alert <?php echo $this->session->flashdata(
        "msg_class"
    ); ?> alert-dismissible fade show" role="alert">
        <strong><?php echo $this->session->flashdata("msg"); ?></strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
<?php endif; ?>
<!-- /Breadcrumb -->

<!-- Main Content -->
<div class="container">
    <div class="row">
        <!-- Widget Item -->
        <div class="col-md-12">
            <div class="widget-area-2 proclinic-box-shadow">
                <h3 class="widget-title">Doctor Details</h3>
                <div class="row no-mp">
                    <div class="col-md-4">
                    <div class="card mb-4">
        <img class="card-img-top" src="<?= $base_url ?>assets/images/<?= $details[
        "profile_image"
    ] ?>" alt="Doctor image" style="height: 550px;">
        <div class="card-body">
            <h4 class="card-title">Dr. <?= $details["doctor_name"] ?> <?= $details[
         "last_name"
     ] ?></h4>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <form class="d-inline-block" action="<?= $base_url ?>Doctor/edit_profile" method="post">
                <input type="hidden" name="edit_id" value="<?= $details[
                    "doctor_id"
                ] ?>">
                <button type="submit" class="btn btn-success mb-2">
                    <span class="ti-pencil-alt"></span> Edit Doctor
                </button>
            </form>
            <button type="button" class="btn btn-danger">
                <span class="ti-trash"></span> Delete Doctor
            </button>
        </div>
</div>
    </div>
     <div class="col-md-8">
       <div class="table-responsive">
         <table class="table table-bordered table-striped">
            <tbody>
                     <tr>
                        <td><strong>Specialization</strong></td>
                        <td><?= $details['specialty_name'] ?></td>
                     </tr>
                     <tr>
                        <td><strong>Experience</strong></td>
                        <td>14 Years</td> <!-- Assuming experience is static here; adjust as necessary -->
                     </tr>
                     <tr>
                        <td><strong>Gender</strong></td>
                        <td><?= $details['gender'] ?></td>
                     </tr>
                     <tr>
                        <td><strong>Address</strong></td>
                        <td><?= $details['address'] ?></td> 
                    <tr>
                        <td><strong>Phone</strong></td>
                        <td>+91 <?= $details['phone'] ?></td>
                    </tr>
                    <tr>
                        <td><strong>Date Of Birth</strong></td>
                        <td><?= $details['age'] ?></td>
                    </tr>
                    <tr>
                        <td><strong>Email</strong></td>
                        <td><?= $details['email'] ?></td>
                    </tr>
            </tbody>

        </table>
                            Export links
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center export-pagination">
                                    <li class="page-item">
                                        <a class="page-link" href="#"><span class="ti-download"></span> csv</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#"><span class="ti-printer"></span> print</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#"><span class="ti-file"></span> PDF</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#"><span class="ti-align-justify"></span> Excel</a>
                                    </li>
                                </ul>
                            </nav>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Widget Item -->

        <!-- Doctor Activity Section -->
        <div class="col-md-12">
            <div class="widget-area-2 proclinic-box-shadow">
                <h3 class="widget-title">Doctor Activity</h3>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Patient Name</th>
                                <th>Injury/Condition</th>
                                <th>Visit Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Manoj Kumar</td>
                                <td>Viral fever</td>
                                <td>12-03-2018</td>
                                <td>Condition is good</td>
                            </tr>
                            <tr>
                                <td>Riya</td>
                                <td>Hand Fracture</td>
                                <td>12-10-2018</td>
                                <td>Small Operation</td>
                            </tr>
                            <tr>
                                <td>Paul</td>
                                <td>Dengue</td>
                                <td>15-10-2018</td>
                                <td>Admitted in General Ward</td>
                            </tr>
                            <tr>
                                <td>Manoj Kumar</td>
                                <td>Malaria</td>
                                <td>12-03-2018</td>
                                <td>Condition is good</td>
                            </tr>
                            <!-- Repeat more rows as necessary -->
                        </tbody>
                    </table>
                    <!--Export links-->
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center export-pagination">
                            <li class="page-item">
                                <a class="page-link" href="#"><span class="ti-download"></span> csv</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#"><span class="ti-printer"></span> print</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#"><span class="ti-file"></span> PDF</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#"><span class="ti-align-justify"></span> Excel</a>
                            </li>
                        </ul>
                    </nav>
                    <!-- /Export links-->
                </div>
            </div>
        </div>
        <!-- /Doctor Activity Section -->
    </div>
</div>
<!-- /Main Content -->
