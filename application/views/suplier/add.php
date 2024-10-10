<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Supplier</title>
</head>
<body>
    <h1>Add New Supplier</h1>

    <form action="<?php echo site_url('suplier/store'); ?>" method="post">
        Supplier Name: <input type="text" name="supplier_name" required><br>
        Contact Person: <input type="text" name="contact_person" required><br>
        Contact Phone: <input type="text" name="contact_phone" required><br>
        Address: <textarea name="address" required></textarea><br>
        Email: <input type="email" name="email" required><br>
        <input type="submit" value="Add Supplier">
    </form>
</body>
</html>
