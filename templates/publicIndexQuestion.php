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
		низочек  
	</div>
</div>
</body>