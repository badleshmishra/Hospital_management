<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Items</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        .quantity-input {
            display: none;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h2>Inventory Items</h2>

    <!-- Display the inventory items in a table -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Inventory ID</th> 
                <th>Itemfafaf Name</th>
                <th>Quantity</th>
                <th>Added By</th>
                <th>Created At</th>
                <th>Actions</th> <!-- New column for actions -->
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($items)) : ?>
                <?php foreach ($items as $item) : ?>
                    <tr id="row-<?= $item->inventory_id; ?>">
                        <td><?= $item->inventory_id; ?></td>
                        <td><?= $item->item_name; ?></td>

                        <!-- Display the quantity or input box depending on whether it's in edit mode -->
                        <td>
                            <span class="quantity-text"><?= $item->quantity; ?></span>
                            <form action="<?= base_url('inventory_manager/update_quantity'); ?>" method="post" class="quantity-form" style="display:inline;">
                                <input type="hidden" name="inventory_id" value="<?= $item->inventory_id; ?>">
                                <input type="number" name="quantity" class="form-control form-control-sm quantity-input" value="<?= $item->quantity; ?>" required>
                            </form>
                        </td>

                        <td><?= $item->added_by; ?></td>
                        <td><?= $item->created_at; ?></td>
                        <td>
                            <!-- Edit button -->
                            <button class="btn btn-warning btn-sm edit-btn">Edit</button>

                            <!-- Save button (hidden initially) -->
                            <button class="btn btn-success btn-sm save-btn" style="display:none;" onclick="document.querySelector('#row-<?= $item->inventory_id; ?> .quantity-form').submit();">Save</button>

                            <!-- Delete button with confirmation -->
                            <form action="<?= base_url('inventory_manager/delete_item/' . $item->inventory_id); ?>" method="post" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this item?');">
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="6">No items found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    
    <a href="<?= base_url('inventory_manager/add_item'); ?>" class="btn btn-primary">Add New Item</a>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
$(document).ready(function() {
    // Handle Edit button click
    $('.edit-btn').click(function() {
        var row = $(this).closest('tr');
        
        // Toggle visibility of text and input fields
        row.find('.quantity-text').hide();
        row.find('.quantity-input').show();

        // Show Save button and hide Edit button
        row.find('.edit-btn').hide();
        row.find('.save-btn').show();
    });
});
</script>

</body>
</html>
