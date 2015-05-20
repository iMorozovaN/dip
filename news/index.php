<?php
	error_reporting(E_ALL);
	ini_set('display_errors', true);
	
	header('Content-Type: text/html; charset=utf-8');
	require(__DIR__.'/config.php');//путь к корневой папке новостей
	
	include(Dir.'/functions.php');
	
	connect($host, $username, $password, $db_name); 
			//phpinfo();
			//if (ini_get('short_open_tag') == 'Off') {
				//<p>капут</p><?php
				//err($param);
			//}
			
	$id = get_int_par('id_news',0);	
	$arrNames = array();
	
	if($id){ 
	    $news = readById($id); //кортеж по id
		foreach($news as $row) {
			$pagetitle = "Новости";	
			$styleFromFile = "/news/css/style.css";	
			$importStile = "/news/css/newsstyle.css";	
			
			$arrNames = json_decode($row['arrImg']);
			
			$date = date("j.m.Y", strtotime($row['date']));
			
			include(Dir.'/templates/tpl_news.php');
		}
	} 
	else{
		//--формирование списка-----------------------
		$total = strCount(); //всего записей в таблице   
		$pg = get_int_par('page', 1);//текущая стр
		$pg = checkCurrentPage($pg, $total);
		$start = ($pg - 1) * $num_elements; //Стартовая позиция выборки из БД
		$news = read($start, $num_elements);//массив новостей для текущей страницы
		//--------------------------------------------
		$nav = getNavPublic($pg, $total, "/news/index.php");//постраничная навигация
		$pagetitle = "Новости";
		$styleFromFile = "/news/css/style.css";
		include(Dir.'/templates/tpl_index.php');
	}  