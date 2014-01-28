<?php echo form_open('site/create'); ?>


name <input type="text" name= "title" /><br>
name <input type="text" name= "body" /><br>
submit<input type="submit" name="submit" value="submit"/><br>

<?php echo form_close(); ?>
<?php if(isset($records)) : foreach($records as $row) : ?>


	<div><?php echo $row->id; ?></div>
	<div><?php echo $row->title; ?></div>

	<div><?php echo $row->body; ?></div>
	<div><?php echo anchor("site/delete/$row->id")?></div>
<div><?php echo anchor("site/update/$row->id")?></div>
	<?php endforeach; ?>

	<?php else : ?>
	<h2>No records were returned.</h2>
	<?php endif; ?>
