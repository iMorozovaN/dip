<?php include(Dir.'/templates/header.php');?>
	<form name="addform" action="<?=$action?>" method="post" enctype="multipart/form-data">
		<table cellpadding="0" cellspacing="6">
			<tr>
				<td ><p>Название</p></td>
				<td class = "title-input"><input type="text" name="name"  value="<?= htmlspecialchars($name); ?>"></td>
			</tr>
			<tr>
				<td class="all"><p >Содержание</td>
				<td><textarea name="text" rows=10 wrap="soft"><?=$text; ?></textarea></td>
			</tr>
			<tr>
				<td ><p>Автор</p></td>
				<td><input type="text" name="author" size="81" value='<?=$author; ?>'></td>
			</tr>
			<tr>
				<td ><p>Дата</p></td>
				<td><input type="text" name="date" size="15" value='<?=$date; ?>'></td>
			</tr>
			<tr>
				<input type=hidden name="page" value= <?=$pg;?> >
			</tr>
			<tr></tr>
			<tr >
				<td ><p>Добавление <br>изображений<br>для слайдера</p></td>
				<td class="img-midle" >
				<input  class="but" type="file" name="pictures[]" />
				<input class="but" type="file" name="pictures[]" />
				<input class="but" type="file" name="pictures[]" />
				</td>  
			</tr>
			<tr >
				<br>
				<td><input class="but" type="submit" value="<?=$value?>"></td>  
				<td></td>
			</tr>
			<input  type=hidden name=id_news value= <?=$id;?> >
		</table>
		
	</form>
	<div>
		<?php foreach($warn as $text):  ?>
			<p class=err><?=$text?></p>
		<?php endforeach ?>
	</div>	
	

	<?php if (!empty($arrFiles) && ($arrFiles != '[]')):?>
		<p class="title-imgs">Загруженные изображения:</p>
	<?php endif; ?>	
	<table class="img-preview">
		<?php 
		$count=0;
		$files = !empty($arrFiles)? json_decode($arrFiles, true): array();
		
		if($files) foreach ($files as $fileName){
			if ($count==0) echo"<tr>";
			$count++; 	?>
		<td>
			<div class = "img-item">
				<img src = "/news/img/<?=$fileName?>">
				<form action = "/news/admin/index.php?cmd=delImg" method="post">
					<button type="submit">удалить [x]</button>
					<input type=hidden name="fileName" value= <?=$fileName?> >
					<input type=hidden name="id_news" value= <?=$id?> >
				</form>
			</div>
		</td>
		<?php  if ($count == 4){ 
				$count=0; 
				echo "</tr>"; 
			}
		}?>
	</table>
	
<?php include(Dir.'/templates/footer.php');?>