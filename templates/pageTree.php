<?php include(BASEPATH.'/news/templates/headerWithMenu.php');?>


	
	<p class="addnews">
		<a href="index.php?module=pages&cmd=edit">Добавить стр</a>
	</p>
	<!-- динамические страницы: -->
	<div class="tree">
		<?php foreach ($p as $node): ?>
		<div>
			<?=$node;?>
		</div>
		<?php endforeach;?>
	</div>

	<p class="title"><b><?=$title2;?></b></p>
	<!-- статические страницы: -->
	<div>
		<?php foreach ( $staticPages as $itPage): ?>
		
			<ul class="mainPage">
			<li class="subPage">
					<div>
						<a href="index.php?module=pages&cmd=edit&page_id=<?=$itPage["id"];?> "><?=$itPage["title"];?></a>
					</div>
			</li>
			</ul>

		<?php endforeach;?>

	</div>