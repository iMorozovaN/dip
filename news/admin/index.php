<?php 
	header('Content-Type: text/html; charset=utf-8');
    session_start();
    require(__DIR__.'/../config.php');//путь к корневой папке сайта
	include(Dir.'/functions.php');
	connect($host, $username, $password, $db_name); 

    /**/


    $config = include(__DIR__.'/../../config/config.php'); // подлючаем конфиги

    define('BASEPATH', $config['basepath']);// определяем базовый путь

    require_once(BASEPATH.'/engine/FileLoader.php');    # и автоподгрузчик   файлов с классами  см. файл /engine/FileLoader.php

    engine\FileLoader::registerPath(BASEPATH.'/'); # инитим автолоадер, говорим ему, что искать файлы начиная с базового пути

    $auth = new engine\AuthManager(); # если нужно создаем экземпляр проверялки авторизации

    if(!$auth->isLogin()) {
        header('Location: /');
        exit;
    }

    /**/

	$cmd = get_str_par('cmd', 'read'); 
	$warn = array();
	$a = 100;
	
	while  (!is_null($cmd)){
	
		if(--$a <= 0) break;
	
		switch ($cmd) {		
		case 'delete':	
			$id = get_int_par('id_news');
			$pg =  get_int_par('page', 1);
			if(delete($id)) {?>
				<script type="text/javascript">
					window.location.href="/news/admin/index.php?page=<?= $pg ?>";
				</script> 
				<?php
			//$cmd = "read";
			}
			else{
				echo "<p>ошибка при обращении к блоку новостей".$id."</p>";
				err();
			}
		break;
		
		case 'delImg':	
			$id = get_int_par('id_news', 0);
			$fileName = get_str_par('fileName');
			
			// забираем старый массв имен файлов:-------------
			 
			$news = readById($id);  
			
			if(!isset($news[0])) err();
			
			$arrFiles = json_decode($news[0]['arrImg'], true); 
			
			
			//------------------------------------------------
			$key = array_search($fileName, $arrFiles);
			if ($key !== false) { 
				
				unset($arrFiles[$key]);
				
				update($news[0]['id_news'], $news[0]['name'], $news[0]['all_text'], $news[0]['date'], $news[0]['author'], $arrFiles);
			
				unlink($savePath.DIRECTORY_SEPARATOR.$fileName);
			}
			
			$cmd = "update";
		break;
		//-----подготовка для формы добавления-------------------------------------------
		case 'add':		
			$name="";
			$text ="";
			$author="";
			$cmd = "addUpdate";
			$id = '';
            $pg = '';
		break;
		//-----добавление-----------------------------------------------------------------
		case 'addnews':
			$name = get_str_par('name'); 
			$text = get_str_par('text'); 
			$date = get_str_par('date'); 
			$author = get_str_par('author'); 
			
			if(empty($name)||empty($text)||empty($date)||empty($author)){
				$warn[] = "Не все поля заполнены!";
				$cmd = "addUpdate";
				break;
			} 
			
			$errMsg = false;
			$arrNames = loadFiles($fieldName, $savePath, $supportedExt);
			
			foreach ($arrNames as $key => $file)
				if ($file['error']) {
					$warn[] = $file['error'];
					$errMsg=true;
					break;
				} 
				
			if ($errMsg) {
				$cmd = "addUpdate";
				break;
			} 
			
			$arr = array();
			foreach ($arrNames as $key ){
				$arr[] = $key['file'];
			}	
			
			$result = create($name, $text, $date, $author, $arr);
			
			if ($result){ 
				?>
				<script type="text/javascript">
					window.location.href="/news/admin/index.php";
				</script> 
				<?php
				$cmd = "read";
			}
			else{
				echo "Ошибка! Запись не добавлена";
			}
			
		break;
		//----данные для формы обновления----------------------------------------------------
		case 'update':
			$id = get_int_par('id_news');
			$pg = get_int_par('page', 1);
			if($id != 0) { 
				$news = readById($id);  
			} 
			else err(); 
			if(!$news) err();	
			foreach($news as $row){
				$name = $row['name'];
				$text = $row['all_text'];
				$date = $row['date'];
				$author = $row['author'];
				$arrFiles = $row['arrImg']; 
			
			}

			$cmd = "UpdateForm";
		break;
		//----обновление-----------------------------------------------------------------------
		case 'updatenews':
			$name = get_str_par('name'); 
			$text = get_str_par('text'); 
			$date = get_str_par('date'); 
			$author = get_str_par('author');
			$id = get_int_par('id_news');	
			$pg = get_int_par('page',1);
			
			// забираем старый массв имен файлов:-------------
			if($id != 0) { 
				$news = readById($id);  
			} 
			else err(); 
			if(!$news) err();	
			foreach($news as $row){
				$arrFiles = json_decode($row['arrImg'],true); 
			}
			//------------------------------------------------
			
			if(empty($name)||empty($text)||empty($date)||empty($author)) {
				
				$warn[] = "Не все поля заполнены!";
				$cmd = "UpdateForm";
				break;
			}
			//
			$errMsg = false;
			$arrNames = loadFiles($fieldName, $savePath, $supportedExt);
			
			foreach ($arrNames as $key => $file)
				if ($file['error']) {
					$warn[] = $file['error'];
					$errMsg=true;
					break;
				} 
				
			if ($errMsg) {
				$cmd = "UpdateForm";
				break;
			} 
			
			$arr = array(); //забираем имена файлов
			foreach ($arrNames as $key ){
				$arr[] = $key['file'];
			}	
			
			//объединить массив старых и новых файлов
			$files = array_merge($arrFiles, $arr);
			
			$result = update($id, $name, $text, $date, $author, $files);	
			?>
				<script type="text/javascript">
					window.location.href="/news/admin/index.php?page=<?=$pg?>";
				</script> 
				<?php
		$cmd = "read";
		break;
		}	

		switch ($cmd){
		//----список новостей на стартовой странице------------------------------
		case 'read':
			$total = strCount(); //всего записей в таблице   
			$pg = get_int_par('page', 1);
			$pg = checkCurrentPage($pg, $total);
			
			$start = ($pg - 1) * $num_elements; //Стартовая позиция выборки из БД
			$author = get_str_par('authors');
			if($author){
				$news = readByAuthor($author);
				$pg = 1;
				$total = 1; // для постраничной навигации
			}
			else{
				$news = read($start, $num_elements); 
			}
			$res = getAuthorsList();
			
			$styleFromFile="/news/css/styleadmin.css";
			$adr = "/admin/index.php";
			$tip = "В админку";
			$link = "<< Вернуться в панель управления";
			$titlePage = "Управление блоком \"Новости\"";
		
			$nav = getNav($pg, $total, "/news/admin/index.php");	
			include(Dir.'/templates/tpl_admin.php');	
			$cmd = Null;
		break;
		//----подключение шаблона при добавлении------------------------------------
		case 'addUpdate':
			$styleFromFile="/news/css/styledel.css";
			$adr = "/news/admin/index.php";
			$tip = "Отмена добавления";
			$link = "<< Перейти к управлению блоком \"Новости\"";
			$titlePage = "Добавление новости";
			$action="/news/admin/index.php?cmd=addnews";
			$value="Добавить";
			include(Dir.'/templates/tpl_add_update.php');
			$cmd = Null;
			break;
		//----подключение шаблона при обновлении------------------------------------
		case 'UpdateForm':
			$styleFromFile="/news/css/styledel.css";
			$adr = "/news/admin/index.php?page=$pg";
			$tip = "Отмена изменения";
			$link = "<< Перейти к управлению блоком \"Новости\"";
			$titlePage = "Редактирование новости";
			$action="/news/admin/index.php?cmd=updatenews";
			$value="Сохранить";
			include(Dir.'/templates/tpl_add_update.php');
			$cmd = Null;
		break;
		}
	}