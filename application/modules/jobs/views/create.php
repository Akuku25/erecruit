<h1><?php echo $headline; ?></h1>

<?= validation_errors("<p style='color: red;'>", "</p>")?>

<?php
if (isset($flash))
{
	echo $flash;
}
?>

<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon white edit"></i><span class="break"></span>Job Details</h2>
			<div class="box-icon">
				<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
			</div>
		</div>
		<div class="box-content">
			<?php
			if (isset($update_id))
			{
				$form_location = base_url()."jobs/create/".$update_id;
			}
			else
			{
				$form_location = base_url()."jobs/create";
			}
			?>
			<form class="form-horizontal" method="post" action="<?= $form_location ?>">
				<fieldset>
					<div class="control-group">
						<label class="control-label">Job Title </label>
						<div class="controls">
							<input type="text" class="span6" name="title" value="<?= $title ?>">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Company Name </label>
						<div class="controls">
							<input type="text" class="span6" name="company" value="<?= $company ?>">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Location </label>
						<div class="controls">
							<input type="text" class="span6" name="location" value="<?= $location ?>">
						</div>
					</div>
					<div class="control-group hidden-phone">
						<label class="control-label">Job Description</label>
						<div class="controls">
							<textarea class="cleditor" rows="3" name="description"><?= $description ?></textarea>
						</div>
					</div>
					<div class="control-group hidden-phone">
						<label class="control-label">Responsibilities</label>
						<div class="controls">
							<textarea class="cleditor" rows="3" name="responsibilities"><?= $responsibilities ?></textarea>
						</div>
					</div>
					<div class="control-group hidden-phone">
						<label class="control-label">Skills</label>
						<div class="controls">
							<textarea class="cleditor" rows="3" name="skills"><?= $skills ?></textarea>
						</div>
					</div>
					<div class="control-group hidden-phone">
						<label class="control-label">Perks</label>
						<div class="controls">
							<textarea class="cleditor" rows="3" name="perks"><?= $perks ?></textarea>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Min Salary </label>
						<div class="controls">
							<input type="text" class="span2" name="salary_min" value="<?= $salary_min ?>">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Max Salary </label>
						<div class="controls">
							<input type="text" class="span2" name="salary_max" value="<?= $salary_max ?>">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Type </label>
						<div class="controls">
							<?php
							$data_rel = 'data-rel="chosen"';
							$options = array(
								''           => 'Please Select...',
								'Full time'           => 'Full Time',
								'Part time'         => 'Part Time',
							);
							echo form_dropdown('duration', $options, $duration, $data_rel);
							?>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Deadline </label>
						<div class="controls">
							<input type="date" class="span6" name="expires" value="<?= $company ?>">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Active </label>
						<div class="controls">
							<?php
							$data_rel = 'data-rel="chosen"';
							$options = array(
								''           => 'Please Select...',
								'yes'           => 'Active',
								'no'         => 'Inactive',
							);
							echo form_dropdown('deleted', $options, $deleted, $data_rel);
							?>
						</div>
					</div>

					<div class="form-actions">
						<button type="submit" class="btn btn-primary" name="submit" value="Submit">Save changes</button>
						<button type="submit" class="btn" name="submit" value="Cancel">Cancel</button>
					</div>
				</fieldset>
			</form>

		</div>
	</div><!--/span-->

</div><!--/row-->
