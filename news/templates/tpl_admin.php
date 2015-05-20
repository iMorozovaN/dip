<?php include(Dir.'/templates/header.php');?>
<div id="content">
	<p class=addnews><a href="/news/admin/index.php?cmd=<?="add"?>" title="Добавить новую новость на сайт" ><?="Добавить новость"?></a></p>
	<table>
		<tr class=tabletitle>
			<td class="date"><p><b>Дата</b></p></td>
			<td ><p><b>Новость</b></p></td>
			<td ><p><b>Автор</b></p></td>
			<td colspan=2><p><b>Действия</b></p></td>
		</tr>
		<?php foreach($news as $row): ?>
			<?php $text = announce($row['all_text']);?>
			<?php include('table_admin.php');?>
		<?php endforeach; ?>
	</table>	
	<div class=select> 
		<form name="form" action="index.php" method="post">
			<select name=authors size = 1  > 
			<option selected disabled>Выбрать автора</option> 
			<?php while($result = mysql_fetch_array($res)): ?>  
				<option value = "<?=$result['author']?>"> <?=$result['author']?></option>
			<?php endwhile;?> 
			</select>
			<input class=but type="submit" value="Выбрать">
		</form>
		<p class=ToList><a href="/news/admin/index.php" title="отменить выборку" >Отмена</a>  
	</div>
<p class=nav><?=$nav?></p>		

</div>
<?php include(Dir.'/templates/footer.php');?>