<h2>Add a course</h2>

<?php echo validation_errors(); ?>

<?php echo form_open('course/create') ?>

	<label for="title">Title</label>
	<input type="input" name="title" /><br />

	<label for="dept_name">Department</label>
	<input type="input" name="dept_name" /><br />

	<!-- giving up on dropdown for now...-->
	<!-- <?php echo form_dropdown('dept_name', $depts, '')?> <br />-->

	<!-- <label for="prof_id">Professor</label>
	<input type="input" name="prof_id" /><br /> -->

	<input type="submit" name="submit" value="Add course" />

</form>