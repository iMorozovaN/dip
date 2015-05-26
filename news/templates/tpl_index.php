	<h1><?=$pagetitle?>:</h1>
	<?php if (!$news): ?>
		<p>Нет еще ни одной новости.</p>
	<?php endif?>	
	<?php foreach($news as $row): ?>
		<?php $text = announce($row['all_text']); ?>
		<?php include(Dir.'/templates/tpl_announce.php');?>
	<?php endforeach?>
<p class="nav"><?=$nav?></p>   

    