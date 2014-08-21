
<div id="wrap">
	<ul class ="students">
		<?php foreach ($students as $student_item): ?>
		<li>

		    <h2><?php echo $student_item['firstname'].' '.$student_item['middlename'].' '.$student_item['lastname'] ?></h2>
		    <div class="main">
		    	<?php echo "Major:" ?>
		        <?php echo $student_item['dept_name'] ?>
		    </div>
		    <p><a href="<?php echo base_url();?>index.php/student/view/<?php echo $student_item['id'] ?>">view / edit student </a></p>
		</li>
		<?php endforeach ?>
	</ul>

	<p><a href="<?php echo base_url();?>index.php/student/create">add new student </a></p>
	<p><a href="<?php echo base_url();?>index.php/">home</a> </p>

	<ul class="pagination">
	  <li><a href="<?php echo base_url();?>index.php/student/page/<?php echo max(1, $pagenum-1)?>">&laquo;</a></li>
	  <li><a href="<?php echo base_url();?>index.php/student/page/1">1</a></li>
	  <li><a href="<?php echo base_url();?>index.php/student/page/2">2</a></li>
	  <li><a href="<?php echo base_url();?>index.php/student/page/3">3</a></li>
	  <li><a href="<?php echo base_url();?>index.php/student/page/4">4</a></li>
	  <li><a href="<?php echo base_url();?>index.php/student/page/5">5</a></li>
	  <li><a href="<?php echo base_url();?>index.php/student/page/<?php echo $pagenum+1?>">&raquo;</a></li>
	</ul>
</div>