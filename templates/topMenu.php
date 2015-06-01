<div class="container-fluid b-header">
<div class="testfon"></div>
	<div class="container  b-header-min">
		<div class="row ">
  			<div class=" b-top-menu-0">
				<!--<nav class="navbar  navbar-fixed-top b-navbar-topmenu navbar-default">-->
				<nav class="navbar b-navbar-topmenu navbar-default">
				  <div class="container-fluid b-top-menu-1">
				    <div class="col-md-3 navbar-header sosh">
				      <a class="navbar-brand" href="http://1boot.ru/">
				        МБОУ "СШ №3"
				      </a>
				    </div>
				    <div class="col-md-9 b-top-menu-2">
				  
				      <ul class="nav nav-pills nav-justified  ">
						<!-- выводим главную страницу первой (лучше придумывать некогда)-->
				      	<?php foreach ($statics as $item):?>
						<?php if ($item["id"] == '51'): ?>
							<?php if ($_GET["page_id"]==$item["id"] || empty($_GET)):?>
							<li role="presentation"  class="active"><a href="/index.php?module=public&cmd=index&page_id=<?=$item["id"];?>"><?=$item["title"];?></a></li><?php else:?>
							<li role="presentation"><a href="/index.php?module=public&cmd=index&page_id=<?=$item["id"];?>"><?=$item["title"];?></a></li>
							<?php endif;?>
						<?php endif;?>
						<?php endforeach;?>
						<!-- выводим модули (новости и вопросы)-->
				        <?php if ($_GET["module"]=="news") :?><li role="presentation" class="active"><a href="/index.php?module=news&cmd=index">Новости</a></li><?php else:?>
						<li role="presentation"><a href="/index.php?module=news&cmd=index">Новости</a></li><?php endif;?>
						<?php if ($_GET["module"]=="question"):?><li role="presentation" class="active"><a href="/index.php?module=question&cmd=index">Обратная связь</a></li><?php else:?>
						<li role="presentation"><a href="/index.php?module=question&cmd=index">Обратная связь</a></li><?php endif;?>
						<!-- выводим все статические страницы, кроме главной-->
						<?php foreach ($statics as $item):?>
						<?php if ($item["id"]!= '51' && $item["id"]!= '45'): ?>
							<?php if ($_GET["page_id"]==$item["id"]):?>
							<li role="presentation"  class="active"><a href="/index.php?module=public&cmd=index&page_id=<?=$item["id"];?>"><?=$item["title"];?></a></li><?php else:?>
							<li role="presentation"><a href="/index.php?module=public&cmd=index&page_id=<?=$item["id"];?>"><?=$item["title"];?></a></li>
							<?php endif;?>
						<?php endif;?>
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
			      <img src="/slider/child.jpg" alt="...">
			      <div class="carousel-caption">
			       
			      </div>
			    </div>
			    <div class="item">
			      <img src="/slider/girls.jpg" alt="...">
			      <div class="carousel-caption">
			       
			      </div>
			    </div>
			    <div class="item">
			      <img src="/slider/vipusk.jpg" alt="...">
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