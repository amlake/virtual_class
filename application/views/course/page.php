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

<ul class="pagination">
	  <li><a href="<?php echo base_url();?>index.php/course/page/<?php echo max(1, $pagenum-1)?>">&laquo;</a></li>
	  <li><a href="<?php echo base_url();?>index.php/course/page/1">1</a></li>
	  <li><a href="<?php echo base_url();?>index.php/course/page/2">2</a></li>
	  <li><a href="<?php echo base_url();?>index.php/course/page/3">3</a></li>
	  <li><a href="<?php echo base_url();?>index.php/course/page/4">4</a></li>
	  <li><a href="<?php echo base_url();?>index.php/course/page/5">5</a></li>
	  <li><a href="<?php echo base_url();?>index.php/course/page/<?php echo $pagenum+1?>">&raquo;</a></li>
</ul>
</div>