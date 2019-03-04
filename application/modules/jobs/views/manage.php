<h1><?= $headline ?></h1><br>

<?php
echo anchor('jobs/create', 'Add New Job', array('class' => 'btn btn-primary'));
echo "<br><br>";
?>

<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon white tag"></i><span class="break"></span>Jobs</h2>
			<div class="box-icon">
				<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
			</div>
		</div>
		<div class="box-content">
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
				<thead>
				<tr>
					<th>Job Title</th>
					<th>Company</th>
					<th>Location</th>
					<th>Type</th>
					<th>Expires</th>
					<th>Actions</th>
				</tr>
				</thead>
				<tbody>
				<?php
					foreach ($query->result() as $row):
						$edit_job_url = base_url()."jobs/create/".$row->id;
						$delete_job_url = base_url()."jobs/delete/".$row->id;
				?>
					<tr>
						<td><?= $row->title ?></td>
						<td class="center"><?= $row->company ?></td>
						<td class="center"><?= $row->location ?></td>
						<td class="center"><?= $row->duration ?></td>
						<td class="center"><?= $row->expires ?></td>
						<td class="center">
							<a class="btn btn-info" href="<?= $edit_job_url ?>">
								<i class="halflings-icon white edit"></i>
							</a>
							<a class="btn btn-danger" href="<?= $delete_job_url ?>">
								<i class="halflings-icon white trash"></i>
							</a>
						</td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div><!--/span-->

</div><!--/row-->
