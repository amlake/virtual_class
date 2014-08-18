<div id="wrap">
<ul class ="courses">
	<?php foreach ($courses as $course_item): ?>
	<li>

	    <h2><?php echo $course_item['title'] ?></h2>
	    <div class="main">
	    	<?php echo "Department:" ?>
	        <?php echo $course_item['dept_name'] ?>
	    </div>
	    <p><a href="course/view/<?php echo $course_item['id'] ?>">view / edit course </a></p>
	</li>
	<?php endforeach ?>
</ul>

<p><a href="<?php echo base_url();?>index.php/course/create">add new course </a></p>
<p><a href="<?php echo base_url();?>index.php/">home</a> </p>
</div>