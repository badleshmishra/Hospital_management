

<div class="container mt-4">
    <div class="card">
        <div class="card-header text-center bg-danger">
            <h5>Drug Allocation Management</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>Allocation ID</th>
                        <th>Patient Name</th>
                        <th>Drug Name</th>
                        <th>Total Quantity</th>
                        <th>Quantity Allocated</th>
                        <th>Remaining Quantity</th>
                        <!-- <th>Allocated By</th> -->
                        <th>Allocation Date</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($drug)): ?>
                        <?php foreach ($drug as $row): ?>
                            <tr>
                                <td><?= $row->allocation_id; ?></td>
                                <td><?= $row->first_name . ' ' . $row->last_name; ?></td>
                                <td><?= $row->drug_name; ?></td>
                                <td><?= $row->total_quantity; ?></td> <!-- Display total quantity -->
                                <td><?= $row->quantity_allocated; ?></td>
                                <td>
                                    <?php 
                                        // Calculate remaining quantity in the view
                                        $remaining_quantity = $row->total_quantity - $row->quantity_allocated; 
                                        echo $remaining_quantity; 
                                    ?>
                                </td> <!-- Display remaining quantity -->
                                <!-- <td><?= $row->allocated_by; ?></td> -->
                                <td><?= $row->allocation_date; ?></td>
                                <td><?= $row->created_at; ?></td>
                                <td><?= $row->updated_at; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="10" class="text-center">No data found</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
