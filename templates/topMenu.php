<div class="mainHeader">
	<p>Верхний блок</p>
</div>
<div class="top_menu">
    <a href="/index.php?module=news&cmd=index">Новости</a>
    <a href="/index.php?module=question&cmd=index">Обратная связь</a>


    <?php foreach ($statics as $item):?>
    <a href="/index.php?module=public&cmd=index&page_id=<?=$item["id"];?>"><?=$item["title"];?></a>
    <?php endforeach;?>
</div>