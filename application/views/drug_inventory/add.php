
    <div class="container mt-5">
        <h1 class="mb-4">Drug Inventory Add</h1>
        <!-- The form tag should have method POST and action to your controller method -->
        <form action="<?= base_url('drug_inventory/add') ?>" method="POST">
            <div class="form-group">
                <label for="supplier_name">Supplier Name:</label>
                <input type="text" class="form-control" name="supplier_name" id="supplier_name" required>
            </div>

            <div class="form-group">
                <label for="drug_name">Drug Name:</label>
                <input type="text" class="form-control" name="drug_name" id="drug_name" required>
            </div>

            <div class="form-group">
                <label for="batch_number">Batch Number:</label>
                <input type="text" class="form-control" name="batch_number" id="batch_number" required>
            </div>

            <div class="form-group">
                <label for="received_quantity">Received Quantity:</label>
                <input type="number" class="form-control" name="received_quantity" id="received_quantity" required>
            </div>

            <div class="form-group">
                <label for="current_quantity">Current Quantity:</label>
                <input type="number" class="form-control" name="current_quantity" id="current_quantity" required>
            </div>

            <div class="form-group">
                <label for="expiry_date">Expiry Date:</label>
                <input type="date" class="form-control" name="expiry_date" id="expiry_date" required>
            </div>

            <div class="form-group">
                <label for="received_date">Received Date:</label>
                <input type="date" class="form-control" name="received_date" id="received_date" required>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

