<div id="wrap">
	<div id="success" class="success">

	</div>

	<div class="student">
		<?php echo form_open('/'); ?>
		<div class="div-table">
			<table >
			    <tbody>
			    	<div class="div-table-row">
			            <div class="div-table-col-head"><b>Student Name</b></div>
			        </div>
			        <div class="div-table-row">
			            <div class="div-table-col">
			                <?php echo form_input(array('name' => 'firstname', 'value' => $student_item['firstname'], 'id' => 'firstname')); ?>
			            </div>
			        </div>
			        <div class="div-table-row">
			            <div class="div-table-col">
			                <?php echo form_input(array('name' => 'middlename', 'value' => $student_item['middlename'], 'id' => 'middlename')); ?>
			            </div>
			        </div>
			        <div class="div-table-row">
			            <div class="div-table-col">
			                <?php echo form_input(array('name' => 'lastname', 'value' => $student_item['lastname'], 'id' => 'lastname')); ?>
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

		 <input type="hidden" id="studentid" value = <?php echo $student_item['id']; ?> />


		<div class="update-student"> <p><?php echo form_submit('', 'Update student'); ?></p> </div>
		<?php echo form_close(); ?>


		<p><a href="#" id="popover">Enroll in a course</a></p>
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
						<li role="presentation" id = "<?php echo $each['id']?>" title= "<?php echo $student_item['id']?>"><a role="menuitem" tabindex="-1" href="#"><?php echo $each['title']?></a></li>
					<?php }?>
				  </ul>
				</div>
			</form>
		</div>

		<p><a href="<?php echo base_url();?>index.php/student/delete/<?php echo $student_item['id'] ?>">Delete student</a> </p>
		<p><?php echo "<a href=\"javascript:history.go(-1)\">Go back</a>"; ?></p>
		<p><a href="<?php echo base_url();?>index.php/">Home</a> </p>
	</div>
</div>
 