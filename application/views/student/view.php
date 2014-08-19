<div id="wrap">
	<div class="student">
		<?php echo form_open('student/edit_student/'.$student_item['id']); ?>
		<div class="div-table">
			<table >
			    <tbody>
			    	<div class="div-table-row">
			            <div class="div-table-col-head"><b>Student Name</b></div>
			        </div>
			        <div class="div-table-row">
			            <div class="div-table-col">
			                <?php echo form_input(array('name' => 'firstname', 'value' => $student_item['firstname'])); ?>
			            </div>
			        </div>
			        <div class="div-table-row">
			            <div class="div-table-col-head"><b>Major</b></div>
			        </div>
			        <div class="div-table-row">
			            <div class="div-table-col"><?php echo $student_item['dept_name']; ?></div>
			        </div>
		    	</tbody>
			</table>
		</div>


		<p><?php echo form_submit('', 'Update student'); ?></p>
		<?php echo form_close(); ?>

		<a href="#" id="popover">Enroll <?php echo $student_item['firstname'] ?> in a course</a>
		<div id="popover-head" class="hide">Enroll</div>
		<div id="popover-content" class="hide">
			<form action ="" method ="POST" id="my_form">
				<div class="dropdown"> <!-- Twitter Bootstrap component -->
				  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
				    Select course
				    <span class="caret"></span>
				  </button>
				  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
				    <?php
						foreach($course_names as $each){ ?>
						<li role="presentation" id = "<?php echo $each['id']?>" title= "<?php echo $each['title']?>"><a role="menuitem" tabindex="-1" href="#"><?php echo $each['title']?></a></li>
					<?php }?>
				  </ul>
				</div>
			</form>
		</div>

		<p><a href="<?php echo base_url();?>index.php/student/delete/<?php echo $student_item['id'] ?>">Delete student</a> </p>
		<p><a href="<?php echo base_url();?>index.php/student">Go back</a> </p>
	</div>
</div>
 