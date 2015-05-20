<div class="newsblock1">
	<p class="title">

		<a class="newsname" href="/index.php?module=news&cmd=index&id_news=<?=$row['id_news'];?>"><?=$row['name'];?></a>  <!-- ссылка на новость -->
		<span class="date"><?=date("j.m.Y", strtotime($row['date']));?></span>

	</p>
	<p class="newsblock"><?=$text;?></p>
</div>