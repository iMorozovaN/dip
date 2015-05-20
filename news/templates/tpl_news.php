<div >
	<p class=title><b><?=$row['name']?></b><span class=date><?=$date?></span></p>
	<p class=newsblock><?=$row['all_text']?></p> 
	<p class=author><b>Author:&nbsp;</b><?=$row['author']?></p>


<?php if (isset($arrNames) ): ?>
	<div style = "width: 100%;">
		<div class="fotorama" data-nav="thumbs" data-height="300px">
		<?php foreach($arrNames as $path): ?>
		  <img src="<?= $imgDir.$path ?>">
		<?php endforeach ?>
		</div>
	</div>
<?php endif;?>


	<p class="link"><a href="javascript:window.history.go(-1)"><<< к списку новостей</a></p>
</div>
	
