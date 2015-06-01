<?php include(BASEPATH.'/news/templates/headerWithMenu.php'); ?>
<div class="test">
	<div class="questionBlock">
		<p>Напишите почту для приема вопросов:</p>
		<form name="email" class="email" action="/admin/index.php?module=question&cmd=admin" method="post" enctype="multipart/form-data">
		  <input type="text" name="email"  value="<?= $e; ?>" >
		  <input class="but" type="submit" value="Сохранить">
		</form>
	</div>
</div>
	<?php foreach ($data as $item){ 
        ?>
        <div class="questionBlock"> 
			<p><b>Спрашивает</b> <?= $item['author'];?></p>
			<p><?=  $question->announce($item['question']);?>
			<a class = "linkDel"  onClick="if (confirm('Вы уверены, что хотите удалить? (восстановить будет нельзя)')) return true; else return false;" href='/admin/index.php?module=question&cmd=delete&quest_id=<?=$item["id"]?>' > удалить [Х]</a>
            <a class="linkAnswer" href='/admin/index.php?module=question&cmd=admin&quest_id=<?=$item["id"]?>' >ответить</a>
			</p>
			<p class="opublikovano"><?php if ($item['visible']):?>(опубликовано)<?php endif;?></p>
		</div>
	<?php
	}?>
	
<?php include(BASEPATH.'/news/templates/footer.php');?>

