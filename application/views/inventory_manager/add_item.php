<!-- application/views/inventory/add_item.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Inventory Item</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            max-width: 500px; /* Adjust width for a compact look */
            margin-top: 50px; /* Space from the top */
            padding: 30px; /* Inner padding */
            background-color: #fff; /* Background color for the form */
            border-radius: 10px; /* Rounded corners */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Subtle shadow */
        }
        h2 {
            text-align: center; /* Center the heading */
            margin-bottom: 30px; /* Space below the heading */
        }
        .btn-primary {
            width: 100%; /* Full-width button */
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Add New Inventory Item</h2>

    <!-- Display error messages, if any -->
    <?php if (isset($error)) : ?>
        <div class="alert alert-danger">
            <?= $error; ?>
        </div>
    <?php endif; ?>

    <!-- Form for adding an item -->
    <form action="<?= base_url('inventory_manager/add_item'); ?>" method="post">
        <div class="form-group">
            <label for="item_name">Item Name</label>
            <input type="text" class="form-control" id="item_name" name="item_name" required placeholder="Enter item name">
        </div>

        <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" class="form-control" id="quantity" name="quantity" required placeholder="Enter quantity">
        </div>

        <button type="submit" class="btn btn-primary">Add Item</button>
    </form>
</div>

<!-- Include Bootstrap JS if you are using Bootstrap components -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
