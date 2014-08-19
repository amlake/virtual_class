<div id="wrap">
	<ul class ="students">
		<?php foreach ($students as $student_item): ?>
		<li>

		    <h2><?php echo $student_item['firstname'] ?></h2>
		    <div class="main">
		    	<?php echo "Major:" ?>
		        <?php echo $student_item['dept_name'] ?>
		    </div>
		    <p><a href="student/view/<?php echo $student_item['id'] ?>">view / edit student </a></p>
		</li>
		<?php endforeach ?>
	</ul>

	<p><a href="<?php echo base_url();?>index.php/student/create">add new student </a></p>
	<p><a href="<?php echo base_url();?>index.php/">home</a> </p>
</div>