<div id="wrap">
	<div class="student">
		<?php echo form_open('student/edit_student/'.$student_item['id']); ?>
		<table width="40%" cellpadding="0" cellspacing="0">
		    <thead>
		        <tr>
		            <td><b>Student Name</b></td>
		            <td><b>Major</b></td>
		        </tr>
		    </thead>
		    <tbody>
		        <tr>
		            <td>
		                <?php echo form_input(array('name' => 'firstname', 'value' => $student_item['firstname'])); ?>
		            </td>
		             
		            <td><?php echo $student_item['dept_name']; ?></td>
		        </tr>
	    	</tbody>
		</table>

		<p> Enroll <?php echo $student_item['firstname'] ?> in a course </p>
	 
		<p><?php echo form_submit('', 'Update student'); ?></p>
		<?php 
		echo form_close(); 
		?>

		<p><a href="<?php echo base_url();?>index.php/student/delete/<?php echo $student_item['id'] ?>">Delete student</a> </p>
		<p><a href="<?php echo base_url();?>index.php/student">Go back</a> </p>
	</div>
</div>
 