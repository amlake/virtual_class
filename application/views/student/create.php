<h2>Add a student</h2>

<?php echo validation_errors(); ?>

<?php echo form_open('student/create') ?>

	<label for="firstname">First name</label>
	<input type="input" name="firstname" /><br />

	<label for="dept_name">Major</label>
	<input type="input" name="dept_name" /><br />

	<!-- giving up on dropdown for now...-->
	<!-- <?php echo form_dropdown('dept_name', $depts, '')?> <br />-->

	<!-- <label for="prof_id">Professor</label>
	<input type="input" name="prof_id" /><br /> -->

	<input type="submit" name="submit" value="Add course" />

</form>