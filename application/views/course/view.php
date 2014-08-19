<div id="wrap">
	<?php echo form_open('course/edit_course/'.$course_item['id']); ?>
	<div class="div-table">
		<table >
		    <tbody>
		    	<div class="div-table-row">
		            <div class="div-table-col-head"><b>Course title</b></div>
		        </div>
		        <div class="div-table-row">
		            <div class="div-table-col">
		                 <?php echo form_input(array('name' => 'title', 'value' => $course_item['title'])); ?>
		            </div>
		        </div>
		        <div class="div-table-row">
		            <div class="div-table-col-head"><b>Department</b></div>
		        </div>
		        <div class="div-table-row">
		            <div class="div-table-col">
		            	<?php echo $course_item['dept_name']; ?>
		            </div>
		        </div>
	    	</tbody>
		</table>
	</div>
 
	<p><?php echo form_submit('', 'Update course'); ?></p>
	<?php 
	echo form_close(); 
	?>

	<p><a href="<?php echo base_url();?>index.php/course/delete/<?php echo $course_item['id'] ?>">Delete course</a> </p>
	<p><a href="<?php echo base_url();?>index.php/course">Go back</a> </p>
</div>
 