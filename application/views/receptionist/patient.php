<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="widget-area-2 proclinic-box-shadow">
                <h3 class="widget-title">Patients List</h3>
                <div class="table-responsive mb-3">
                    <table id="tableId" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                           
                                <th>Patient ID</th>
                                <th>Patient Name</th>
                                <th>Age</th>
                                <th>Phone</th>
                                <th>Doctor Name</th>
                            </tr>
                        </thead>
                        <tbody>
    <?php foreach ($patients as $patient): ?>
        <tr>
                <td><?= ($patient['patient_id']); ?></td>
                <td><?= ($patient['first_name'] . ' ' . $patient['last_name']); ?></td>
                <td><?= ($patient['age']); ?></td>
                <td><?= ($patient['phone']); ?></td>
                <td><?= ($patient['doctor_name'] . ' ' . $patient['last_name']); ?></td>
            
        </tr>
    <?php endforeach; ?>
</tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
