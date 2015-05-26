<?php include(BASEPATH.'/templates/header.php');
	include('topMenu.php');
?>


<div class="container ">
<div class="row">
	<?php include('leftMenu.php');?>

	<div class="col-md-9 col-xs-9 b-content">
		<div class="page_content">
			<h1><?=$content['title']?></h1>
			<p><?=$content['text']?></p>

				<?php if ($content['id']=='46'): ?> <!-- Яндекс карта -->
					<p>Адрес школы: ул. Фрунзе, д. 62а</p>
					<script type="text/javascript" charset="utf-8" src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=RpxLcTY0p6bHlmNXRYuAm-S27RDzn1NZ&width=600&height=450"></script>
				<?php endif;?>
				

			<?php if ($content['id']=='44'): ?><!-- карта сайта-->
				<div class="tree">

					<ul class="mainPage">
					    <li class="subPage">
				        	<a href="/index.php?module=news&cmd=index">Новости</a>
				    	</li>
					</ul>
					<ul class="mainPage">
					    <li class="subPage">
				        	<a href="/index.php?module=question&cmd=index">Обратная связь</a>
				    	</li>
					</ul>
					<?php foreach ($p as $node): ?>
						<?=$node;?>
					<?php endforeach;?>

					<?php foreach ( $statics as $itPage): ?>
						<ul class="mainPage">
						<li class="subPage">
							<a href="index.php?module=public&cmd=index&page_id=<?=$itPage["id"];?> "><?=$itPage["title"];?></a>
						</li>
						</ul>
					<?php endforeach;?>

				</div>
			<?php endif;?>
		</div>
	</div>
</div>
</div><!--end content-->

<div class="container-fluid b-footer">	
	<div class="container niz">
		низочек  
	</div>
</div>
</body>
