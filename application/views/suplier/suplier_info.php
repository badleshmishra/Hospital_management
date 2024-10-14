<div class="container mt-5">
    <h1 class="text-center mb-4">Edit Supplier</h1>

    <form action="<?= base_url('suplier/update'); ?>" method="POST">
        <input type="hidden" name="supplier_id" value="<?= $supplier->supplier_id; ?>">

        <div class="form-group">
            <label for="supplier_name">Supplier Name:</label>
            <input type="text" class="form-control" id="supplier_name" name="supplier_name" value="<?= $supplier->supplier_name; ?>" required>
        </div>

        <div class="form-group">
            <label for="contact_person">Contact Person:</label>
            <input type="text" class="form-control" id="contact_person" name="contact_person" value="<?= $supplier->contact_person; ?>" required>
        </div>

        <div class="form-group">
            <label for="contact_phone">Contact Phone:</label>
            <input type="text" class="form-control" id="contact_phone" name="contact_phone" value="<?= $supplier->contact_phone; ?>" required>
        </div>

        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" class="form-control" id="address" name="address" value="<?= $supplier->address; ?>" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= $supplier->email; ?>" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Update Supplier</button>
    </form>
</div>
