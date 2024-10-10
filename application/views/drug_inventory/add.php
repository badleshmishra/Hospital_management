<!DOCTYPE html>
<html>
<head>
    <title>Insert Inventory Data</title>
</head>
<body>
    <h1>Insert Inventory Data</h1>


    
    <label for="supplier_name">Supplier Name:</label>
    <input type="text" name="supplier_name" id="supplier_name" required>
    <br><br>

    <label for="drug_name">Drug Name:</label>
    <input type="text" name="drug_name" id="drug_name" required>
    <br><br>

    <label for="batch_number">Batch Number:</label>
    <input type="text" name="batch_number" id="batch_number" required>
    <br><br>

    <label for="received_quantity">Received Quantity:</label>
    <input type="number" name="received_quantity" id="received_quantity" required>
    <br><br>

    <label for="current_quantity">Current Quantity:</label>
    <input type="number" name="current_quantity" id="current_quantity" required>
    <br><br>

    <label for="expiry_date">Expiry Date:</label>
    <input type="date" name="expiry_date" id="expiry_date" required>
    <br><br>

    <label for="received_date">Received Date:</label>
    <input type="date" name="received_date" id="received_date" required>
    <br><br>

    <!-- created_at and updated_at fields can be auto-handled in the backend -->

    <input type="submit" value="Submit">
    
</body>
</html>
