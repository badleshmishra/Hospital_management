<div class="container">
	<div class="table-responsive">
		<table class="table table-bordered table-striped " id="dataTable">
			<thead>
				<tr>
					<th>Patient Name</th>
					<th>Doctor</th>
					<th>Check-Up</th>
					<th>Date</th>
					<th>Time</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				<?php if (!empty($details)) : ?>
                <?php foreach ($details as $info) : ?>
				<tr>
					<td><?= $info->first_name; ?></td>
					<td><?= $info->doctor_name; ?></td>
					<td><?= $info->first_name; ?></td>
					<td><?= $info->appointment_date; ?></td>
					<td><?= $info->appointment_time; ?></td>
				<td>
					<span class="badge badge-success">Completed</span>
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
	</div>
</div>