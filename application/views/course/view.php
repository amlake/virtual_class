<div id="wrap">
	<?php echo form_open('course/edit_course/'.$course_item['id']); ?>
	<table width="40%" cellpadding="0" cellspacing="0">
	    <thead>
	        <tr>
	            <td><b>Course Title</b></td>
	            <td><b>Department</b></td>
	        </tr>
	    </thead>
	    <tbody>
	        <tr>
	            <td>
	                <?php echo form_input(array('name' => 'title', 'value' => $course_item['title'])); ?>
	            </td>
	             
	            <td><?php echo $course_item['dept_name']; ?></td>
	        </tr>
    	</tbody>
	</table>
 
	<p><?php echo form_submit('', 'Update course'); ?></p>
	<?php 
	echo form_close(); 
	?>

	<p><a href="<?php echo base_url();?>index.php/course/delete/<?php echo $course_item['id'] ?>">Delete course</a> </p>
	<p><a href="<?php echo base_url();?>index.php/course">Go back</a> </p>
</div>
 