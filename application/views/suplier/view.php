
    <div class="container mt-5">
        <h1 class="text-center mb-4">Supplier List</h1>

        <!-- Check if there are any suppliers -->
        <?php if (!empty($supl)): ?>
            <table class="table table-bordered table-striped">
                <thead class="table-light">
                    <tr>
                        <th>Supplier Name</th>
                        <th>Contact Person</th>
                        <th>Contact Phone</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Actions</th> <!-- Added Actions column -->
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($supl as $supplier): ?>
                        <tr>
                            <td><?= ($supplier->supplier_name); ?></td>
                            <td><?= ($supplier->contact_person); ?></td>
                            <td><?= ($supplier->contact_phone); ?></td>
                            <td><?= ($supplier->address); ?></td>
                            <td><?= ($supplier->email); ?></td>
                            <td>
                                

                                  <form action="<?= base_url('suplier/edit'); ?>" method="GET" style="display:inline;">
    <input type="hidden" name="supplier_id" value="<?= $supplier->supplier_id ?>">
    <button type="submit" class="btn btn-warning btn-sm">Edit</button>
</form>
 <!-- Delete Button -->
                                    <form action="<?= base_url('suplier/delete/' . $supplier->supplier_id); ?>" method="POST" style="display:inline;">
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this supplier?');">Delete</button>
                                    </form>

                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="alert alert-warning" role="alert">
                No suppliers found.
            </div>
        <?php endif; ?>

        <div class="text-center mt-4">
            <a href="<?= site_url('suplier/add'); ?>" class="btn btn-primary">Add New Supplier</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
