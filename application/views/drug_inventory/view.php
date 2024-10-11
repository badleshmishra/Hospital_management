
<div class="container mt-5">
    <h1 class="text-center">Drug Inventory</h1>

    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Inventory ID</th>
                <th>Supplier Name</th>
                <th>Drug Name</th>
                <th>Batch Number</th>
                <th>Received Quantity</th>
                <th>Current Quantity</th>
                <th>Expiry Date</th>
                <th>Received Date</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($drug)) : ?>
                <?php foreach ($drug as $item) : ?>
                    <tr>
                        <td><?= $item->inventory_id; ?></td>
                        <td><?= $item->supplier_name; ?></td>
                        <td><?= $item->drug_name; ?></td>
                        <td><?= $item->batch_number; ?></td>
                        <td><?= $item->received_quantity; ?></td>
                        <td><?= $item->current_quantity; ?></td>
                        <td><?= $item->expiry_date; ?></td>
                        <td><?= $item->received_date; ?></td>
                        <td><?= $item->created_at; ?></td>
                        <td><?= $item->updated_at; ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="10" class="text-center">No drug data available.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>


