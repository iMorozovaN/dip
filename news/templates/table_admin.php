<tr><td><p><?=$row['date']?></p></td>
	<td class=text><p class=alltext>
		<a title='Редактировать текст новости' href="/news/admin/index.php?id_news=<?=$row['id_news']?>&cmd=<?="update"?>&page=<?=$pg?>"><?=$row['name']?></a></p>
		<p class=alltext><?=$text?></p>
	</td>			
	<td><p><?=$row['author']?></p></td>
	<td><p><a href="/news/admin/index.php?id_news=<?=$row['id_news']?>&cmd=<?="delete"?>&page=<?=$pg?>" title='Удалить новость'>Удалить</a></td>
	<td><p><a href="/news/admin/index.php?id_news=<?=$row['id_news']?>&cmd=<?="update"?>&page=<?=$pg?>" title='Редактировать текст новости'>Редактировать</a></td>
</tr>
