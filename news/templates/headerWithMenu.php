<html >
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>Администрирование</title>
		<link rel="stylesheet" type="text/css" href="<?=$styleFromFile?>" />

		<script src="/vendor/ckeditor/ckeditor.js"> </script>
		<script src="/news/js/jquery-latest.min.js"></script>
		<script src="/news/js/main.js"></script>
		<link href="/favicon.jpg" rel="shortcut icon"  type="image/jpg" />
	</head>
    <body>
	<div id="page">
		<div id="header"> 

			<?php if (empty($_GET) || isset($_GET["page"])) : ?>
	        	<div class="active"><a href="/news/admin/index.php">Управление новостями</a></div>
	    	<?php else : ?>
	    		<div class="topMenuAdmin"><a href="/news/admin/index.php">Управление новостями</a></div>
	    	<?php endif;?>


			<?php if ($_GET["module"]=="pages") : ?>
	        	<div class="active"><a href="/admin/index.php?module=pages">Управление разделами</a></div>
	    	<?php else : ?>
	    		<div class="topMenuAdmin"><a href="/admin/index.php?module=pages">Управление разделами</a></div>
	    	<?php endif;?>
		

			<?php if ($_GET["module"]=="question") : ?>
	        	<div class="active"><a href="/admin/index.php?module=question&cmd=admin">Ответы на вопросы</a></div>
	    	<?php else : ?>
	    		<div class="topMenuAdmin"><a href="/admin/index.php?module=question&cmd=admin">Ответы на вопросы</a></div>
	    	<?php endif;?>
	    	
			<div class="topMenuAdmin"><a href="/admin/index.php?module=auth&cmd=logout">Выйти</a></div>
			<!--<p><a href="<?=$adr?>" class=link title="<?=$tip?>" ><?=$link?></b></a>   ссылка на предыдущую стр -->
		</div>
		<p class="title"><b><?=$titlePage?></b></p> <!-- заголовок страницы -->