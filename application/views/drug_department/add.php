    <div class="container">
        <h2 class="text-center">Create  Drug Department Allocation</h2>

        <form method="post" action="<?= base_url('Drug_department/add_department'); ?>">
            <div class="form-group">
                <label for="patient_id">Patient ID:</label>
                <input type="text" class="form-control" name="patient_id" id="patient_id" >
            </div>

            <div class="form-group">
                <label for="drug_name">Drug Name:</label>
                <input type="text" class="form-control" name="drug_name" id="drug_name" >
            </div>

          <!--   <div class="form-group">
                <label for="department_name">Department Name:</label>
                <input type="text" class="form-control" name="department_name" id="department_name" >
            </div> -->

            <div class="form-group">
                <label for="quantity_allocated">Quantity Allocated:</label>
                <input type="number" class="form-control" name="quantity_allocated" id="quantity_allocated" min="1" >
            </div>

          <!--   <div class="form-group">
                <label for="remaining_quantity">Remaining Quantity:</label>
                <input type="number" class="form-control" name="remaining_quantity" id="remaining_quantity" min="0" >
            </div> -->
           <!--  <div class="form-group">
                <label for="allocated_by">Allocated By:</label>
                <input type="text" class="form-control" name="allocated_by" id="allocated_by" >
            </div> -->

            <div class="form-group">
                <label for="allocation_date">Allocation Date:</label>
                <input type="date" class="form-control" name="allocation_date" id="allocation_date" >
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
