
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Add New Supplier</h1>

        <form action="<?=base_url('suplier/store'); ?>" method="post">
            <div class="form-group">
                <label for="supplier_name">Supplier Name:</label>
                <input type="text" class="form-control" name="supplier_name" id="supplier_name" required>
            </div>

            <div class="form-group">
                <label for="contact_person">Contact Person:</label>
                <input type="text" class="form-control" name="contact_person" id="contact_person" required>
            </div>

            <div class="form-group">
                <label for="contact_phone">Contact Phone:</label>
                <input type="text" class="form-control" name="contact_phone" id="contact_phone" required>
            </div>

            <div class="form-group">
                <label for="address">Address:</label>
                <textarea class="form-control" name="address" id="address" required></textarea>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" id="email" required>
            </div>

            <button type="submit" class="btn btn-primary">Add Supplier</button>
        </form>
    </div>

   