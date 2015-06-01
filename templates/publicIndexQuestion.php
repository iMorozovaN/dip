<?php include(BASEPATH.'/templates/header.php');

	include('topMenu.php');
	//include('leftMenu.php');

?>
<div class="container ">

<div class="row">
	<?php include('leftMenu.php');?>
	<div class="col-md-9 col-xs-9 b-content">
		<div class="page_content">
			<?php include($pathToTemp);?>
		</div>
	</div>
</div>
</div><!--end content-->

<div class="container-fluid b-footer">	
	<div class="container niz">
		<p>МБОУ "СШ №3", г.Смоленск, ул.Фрунзе, д.62а<br>
		Телефон: (4812) 41-31-71<br>
		Лицензия №4164 от 06.03.2015 выдана Департаментом Смоленской области по образованию, науке и делам молодежи
		</p>
	</div>
</div>
</body>