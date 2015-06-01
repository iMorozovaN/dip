	<div class="col-md-3 col-xs-3 b-left-menu">
	
		<ul class="nav nav-pills nav-stacked">
					<p class="magicLi">Сведения об образовательной организации:</p>

					<?php  foreach ($pagestpl as $node): 

					if (isset($node['items'])):
					?>
				        <li class="dropdown">
				        	<a href="index.php?module=public&cmd=index&page_id=<?=$node['id'];?>" class="dropdown-toggle"  role="button" aria-expanded="false"><?=$node['title']?><span class="caret"></span></a>
				            <ul class="dropdown-menu podmenu" role="menu">
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