<div id="wrap">
	<?php echo form_open('course/edit_course/'.$course_item['id']); ?>
	<div class="div-table">
		<table >
		    <tbody>
		    	<div class="div-table-row">
		            <div class="div-table-col-head"><b>Course title</b></div>
		            <div class="div-table-col-head"><b>Department</b></div>
		        </div>
		        <div class="div-table-row">
		            <div class="div-table-col">
		                 <?php echo form_input(array('name' => 'title', 'value' => $course_item['title'])); ?>
		            </div>
		            <div class="div-table-col">
		            	<?php echo $course_item['dept_name']; ?>
		            </div>
		        </div>
	    	</tbody>
		</table>
	</div>
 
	<p><?php echo form_submit('', 'Update course'); ?></p>
	<?php echo form_close(); ?>

	<p><a href="<?php echo base_url();?>index.php/course/delete/<?php echo $course_item['id'] ?>">Delete course</a> </p>
	<p><?php echo "<a href=\"javascript:history.go(-1)\">Go back</a>"; ?></p>
	<p><a href="<?php echo base_url();?>index.php/">Home</a> </p>
</div>

<div id="wrap1">
	<ul class ="enrolled_students">
		<h2> Enrolled students </h2>
		<?php foreach ($enrolled_students as $student_item): ?>
		<li>
		    <h5><?php echo $student_item ?></h5>
		    <br>
		    <p><a href="<?php echo base_url();?>index.php/course/delete_student/<?php echo $course_item['id'] ?>/<?php echo $student_item ?>">unenroll student</a> </p>
		</li>
		<?php endforeach ?>
	</ul>
</div>
 