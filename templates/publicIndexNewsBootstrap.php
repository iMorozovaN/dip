<?php include(BASEPATH.'/templates/header.php');

	//include('topMenu.php');
	//include('leftMenu.php');

?>

<div class="container-fluid b-header">
	<div class="container b-header-min">
		<div class="row ">
  			<div class="col-md-12 col-xs-12  b-top-menu-0">
				<nav class="navbar navbar-fixed-top b-navbar-topmenu navbar-default">
				  <div class="container-fluid b-top-menu-1">
				    <div class="collapse b-top-menu-2 navbar-collapse" id="bs-example-navbar-collapse-1">
				      <ul class="nav nav-pills navbar-nav">
				  		<p class="navbar-text b-school-title">Школа №3</p>

				        <li class="active"><a href="/index.php?module=news&cmd=index">Новости</a></li>
						<li><a href="/index.php?module=question&cmd=index">Обратная связь</a></li>
						<?php foreach ($statics as $item):?>
						<li><a href="/index.php?module=public&cmd=index&page_id=<?=$item["id"];?>"><?=$item["title"];?></a></li>
						<?php endforeach;?>

				      </ul>
				    </div><!-- /.navbar-collapse -->
				  </div><!-- /.container-fluid -->
				</nav>
  			</div>
		</div>
		<div class="row b-karusel">
			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
			  <!-- Indicators -->
			  <ol class="carousel-indicators">
			    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
			    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
			    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
			  </ol>

			  <!-- Wrapper for slides -->
			  <div class="carousel-inner" role="listbox">
			    <div class="item active">
			      <img src="/slider/wallpapers-violet-flowers-621043.jpeg" alt="...">
			      <div class="carousel-caption">
			       
			      </div>
			    </div>
			    <div class="item">
			      <img src="/slider/wallpapers-violet-flowers-621043.jpeg" alt="...">
			      <div class="carousel-caption">
			       
			      </div>
			    </div>
			    <div class="item">
			      <img src="/slider/wallpapers-violet-flowers-621043.jpeg" alt="...">
			      <div class="carousel-caption">
			 
			      </div>
			    </div>
			  </div>

			  <!-- Controls -->
			  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
			    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			    <span class="sr-only">Previous</span>
			  </a>
			  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
			    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			    <span class="sr-only">Next</span>
			  </a>
			</div>
		</div>
	</div>
</div>
<div class="container b-content">

<div class="row">
	<div class="col-md-3 col-xs-3 b-left-menu">
		<ul class="nav nav-pills nav-stacked">

					<?php  foreach ($pagestpl as $node): 

					if (isset($node['items'])):
					?>
				        <li class="dropdown">
				        	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?=$node['title']?><span class="caret"></span></a>
				            <ul class="dropdown-menu" role="menu">
							<?php  foreach ($node['items'] as $nod): ?>
								<li><a href="index.php?module=public&cmd=index&page_id=<?=$nod['id'];?>"><?=$nod['title'];?></a></li>
							<?php endforeach;?>
	          				</ul>
				        </li>
				    <?php else : ?>

				        <li role="presentation"><a href="index.php?module=public&cmd=index&page_id=<?=$node['id'];?>"><?=$node['title'];?></a></li>
				        
				    <?php
				    endif;
				    endforeach;?>

		</ul>
	</div>
	<div class="col-md-9 col-xs-9 b-content">
		<div class="page_content">
			<?php include($pathToTemp);?>
		</div>
	</div>
</div>
</div><!--end content-->


<div class="container-fluid b-footer">	
	<div class="container">
		низочек  
	</div>
</div>


<?php include(BASEPATH.'/templates/footer.php');?>
