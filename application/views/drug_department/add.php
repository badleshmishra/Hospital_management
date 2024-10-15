<h2>Create New Allocation</h2>

<form method="post" action="<?= base_url('Drug_department/add_department'); ?>">
    <label for="patient_id">Patient ID:</label>
    <input type="text" name="patient_id" id="patient_id">

    <label for="drug_name">Drug Name:</label>
    <input type="text" name="drug_name" id="drug_name">

    <label for="department_name">Department Name:</label>
    <input type="text" name="department_name" id="department_name">

    <label for="quantity_allocated">Quantity Allocated:</label>
    <input type="number" name="quantity_allocated" id="quantity_allocated" min="1">

    <label for="remaining_quantity">Remaining Quantity:</label>
    <input type="number" name="remaining_quantity" id="remaining_quantity" min="0">

    <label for="allocated_by">Allocated By:</label>
    <input type="text" name="allocated_by" id="allocated_by">

    <label for="allocation_date">Allocation Date:</label>
    <input type="date" name="allocation_date" id="allocation_date">

    <button type="submit">Submit</button>
</form>
