<?php
function err() {
  header("HTTP/1.0 404 Not Found");                                 
  include (Dir.'/templates/err.php');
  exit();
}

function connect($host, $username, $password, $db_name){
	$link = mysql_connect($host, $username, $password);
	if(!$link){
		include(Dir.'/templates/db_conn.php');
		exit;
	}
	mysql_select_db($db_name, $link);
	mysql_query("SET NAMES utf8 COLLATE utf8_general_ci"); // SET NAMES utf8 COLLATE utf8_general_ci - для представления 
	                                                       //кодировки соединения (colation_connection) отличного от дефолтного
}

function get_int_par($param, $def=0){
	if (isset($_GET[$param]))
		return (int)$_GET[$param];
	elseif (isset($_POST[$param]))
		return (int)$_POST[$param];
	else 
		return (int)$def;
}

function get_str_par($param, $def=''){
	if (isset($_GET[$param]))
		$str = $_GET[$param];
	elseif (isset($_POST[$param]))
		$str = $_POST[$param];
	else 
		return $def;  // будет ли удовлетворять условию if(empty($name) ??
	if (get_magic_quotes_gpc()) 
		$str = stripslashes($str); 	
	return $str;		
}

function strCount(){
$quer = mysql_query("SELECT COUNT(*) FROM `news`;");
return mysql_result($quer,0,0); //всего записей в таблице   
}

function checkCurrentPage($pg, $total){
	global $num_elements;
	$num_pages = ceil($total / $num_elements);
	if (!$pg) $pg = 1;                          // $pg - текущая страница
	else
	  if($pg < 1) err(); 
	if ($pg > $num_pages) err();
	return $pg;
}


function create($name, $text, $date, $author, $arrNames){
	$name = mysql_real_escape_string($name);
	$text = mysql_real_escape_string($text);
	$date = mysql_real_escape_string($date);
	$author = mysql_real_escape_string($author);
	$author = trim($author);
	
	$arrNames = json_encode($arrNames);
	$arrNames= mysql_real_escape_string($arrNames);
	
	$query = "INSERT INTO `news` VALUES (NULL,'".$name."',0,'".$text."','".$date."','".$author."','$arrNames');";
	mysql_query($query);
	$res = mysql_insert_id();
	return $res;
}

function read($start, $num_elements){
    $start = (int)$start;
	$num_elements = (int)$num_elements;
	
	$query = "SELECT * FROM `news` ORDER BY date DESC LIMIT $start, $num_elements;";
	$res = mysql_query($query);
	 
	$data = array();
	if (!mysql_num_rows($res)) return $data;
		while ($row = mysql_fetch_assoc($res))
			$data[] = $row;	
	return $data;
}

function readById($id){

	$id = (int)$id;
	$query = "SELECT * FROM `news` WHERE id_news=$id;";
	$res = mysql_query($query);
	
	$data = array();
	if (!mysql_num_rows($res)) return $data;
	
	while ($row = mysql_fetch_assoc($res))
		$data[] = $row;	
	return $data;
}

function readByAuthor($author){

	$author = mysql_real_escape_string($author);
	$query = "SELECT * FROM `news` WHERE author='".$author."' ORDER BY date DESC;";
	$res = mysql_query($query);
	$data = array();
	if (!mysql_num_rows($res)) return $data;
		while ($row = mysql_fetch_assoc($res))
			$data[] = $row;	
	return $data;

}

function getAuthorsList(){
	$query = "SELECT DISTINCT author FROM `news`;";
	return $res = mysql_query($query);
}

function update($id, $name, $text, $date, $author, $arrFiles){
	$name = mysql_real_escape_string($name);
	$text = mysql_real_escape_string($text);
	$date = mysql_real_escape_string($date);
	$author = mysql_real_escape_string($author); 
	$author = trim($author);
	$id = (int)$id;
	$arrFiles = json_encode($arrFiles);
	$query = "UPDATE `news` SET name='$name', all_text='$text', `date`='$date',
							    author='$author', `arrImg` = '$arrFiles' WHERE id_news='$id';";
    mysql_query($query);

    if(mysql_errno()) echo mysql_error();
    $res = mysql_affected_rows() ; // mysql_affected_rows() не обновит колонки, уже содержащие новое значение. 
	return $res;
}

function delete($id){
	$id = (int)$id;
	$query = "DELETE FROM news WHERE id_news='$id';";
	if(mysql_query($query)) return true; 
	else return false;
}

function announce($text){
global $numchar;
	$substr = substr($text,$numchar);
	$pos = strpos($substr, " "); 
	if(strlen($text)>$numchar) 
		$dot = "...";                // многоточие после анонса
	else $dot = "";
	$all=$numchar+$pos;
	$res = substr($text, 0, $all) . $dot;
	return $res;
}

function getNav($pg, $total, $adr){
global $num_elements;
$num_pages = ceil($total / $num_elements); // числo страниц
	// нужна ли ссылка "На первую"
	if($pg > 2){
		$first_page = ' <a href="'.$adr.'?page=1"><<</a> ';   
	}
	else{
	   $first_page = '';
	}
	// нужна ли ссылка "На последнюю"
	if($pg < ($num_pages - 2)){
		$last_page = ' <a href="'.$adr.'?page='.$num_pages.'">>></a> ';
	}
	else{
		$last_page = '';
	}
	// нужна ли ссылка "На предыдущую"
	if($pg > 1){
		$prev_page = ' <a href="'.$adr.'?page='.($pg - 1).'"><</a> ';
	}
	else{
		$prev_page = '';
	}
	// нужна ли ссылка "На следущую"
	if($pg < $num_pages){
		$next_page = ' <a href="'.$adr.'?page='.($pg + 1).'">></a> ';
	}
	else{
		$next_page = '';
	}
	//Формируем по 2 страницы до и после текущей (при наличии таковых)
	if($pg - 2 > 0){
		$prev_2_page = ' <a href="'.$adr.'?page='.($pg - 2).'">'.($pg - 2).'</a> ';
	}
	else{
		$prev_2_page = '';
	}
	if($pg - 1 > 0){
		$prev_1_page = ' <a href="'.$adr.'?page='.($pg - 1).'"> '.($pg - 1).' </a> ';
	}
	else{
		$prev_1_page = '';
	}
	if($pg + 2 <= $num_pages){
		$next_2_page = ' <a href="'.$adr.'?page='.($pg + 2).'"> '.($pg + 2).' </a> ';
	}
	else{
		$next_2_page = '';
	}
	if($pg + 1 <= $num_pages){
		$next_1_page = ' <a href="'.$adr.'?page='.($pg + 1).'">'.($pg + 1).'</a> ';
	}
	else{
		$next_1_page = '';
	}
	$nav = $first_page.$prev_page.$prev_2_page.$prev_1_page.$pg.$next_1_page.$next_2_page.$next_page.$last_page;
	return $nav;
}

function getNavPublic($pg, $total, $adr){
global $num_elements;
$num_pages = ceil($total / $num_elements); // числo страниц
	// нужна ли ссылка "На первую"
	if($pg > 2){
		$first_page = ' <a href="'.$adr.'&page=1"><<</a> ';   
	}
	else{
	   $first_page = '';
	}
	// нужна ли ссылка "На последнюю"
	if($pg < ($num_pages - 2)){
		$last_page = ' <a href="'.$adr.'&page='.$num_pages.'">>></a> ';
	}
	else{
		$last_page = '';
	}
	// нужна ли ссылка "На предыдущую"
	if($pg > 1){
		$prev_page = ' <a href="'.$adr.'&page='.($pg - 1).'"><</a> ';
	}
	else{
		$prev_page = '';
	}
	// нужна ли ссылка "На следущую"
	if($pg < $num_pages){
		$next_page = ' <a href="'.$adr.'&page='.($pg + 1).'">></a> ';
	}
	else{
		$next_page = '';
	}
	//Формируем по 2 страницы до и после текущей (при наличии таковых)
	if($pg - 2 > 0){
		$prev_2_page = ' <a href="'.$adr.'&page='.($pg - 2).'">'.($pg - 2).'</a> ';
	}
	else{
		$prev_2_page = '';
	}
	if($pg - 1 > 0){
		$prev_1_page = ' <a href="'.$adr.'&page='.($pg - 1).'"> '.($pg - 1).' </a> ';
	}
	else{
		$prev_1_page = '';
	}
	if($pg + 2 <= $num_pages){
		$next_2_page = ' <a href="'.$adr.'&page='.($pg + 2).'"> '.($pg + 2).' </a> ';
	}
	else{
		$next_2_page = '';
	}
	if($pg + 1 <= $num_pages){
		$next_1_page = ' <a href="'.$adr.'&page='.($pg + 1).'">'.($pg + 1).'</a> ';
	}
	else{
		$next_1_page = '';
	}
	$nav = $first_page.$prev_page.$prev_2_page.$prev_1_page.$pg.$next_1_page.$next_2_page.$next_page.$last_page;
	return $nav;
}

//----загрузка файла--------------------------------------------------------
function loadFiles($fieldName, $savePath, $supportedExt){
	$arrNames = array();
	
	if (!empty($_FILES[$fieldName])) {
		
		foreach ($_FILES[$fieldName]['error'] as $key => $error) {
			try{
				if ($error !== UPLOAD_ERR_OK) continue;

				$tmpFileName = $_FILES[$fieldName]["tmp_name"][$key];

				if (!is_uploaded_file($tmpFileName)) throw new Exception('Файл не был загружен!');
				
				//---проверку расширения перед добавлением в директоррию------

				$ext = getExt($_FILES[$fieldName]["name"][$key], $supportedExt);
							
				if (!isSupportedExt($ext, $supportedExt)) throw new Exception('Формат не поддерживается');

				//-------проверка имени-------------------------------------
					
				$name = convFileName($_FILES["pictures"]["name"][$key]); // вернет имя с расширением
											
				$newFile = $savePath.DIRECTORY_SEPARATOR.$name;
				
				if (file_exists($newFile)) throw new Exception('Файл с таким именем уже есть!');	
				
				move_uploaded_file($tmpFileName, $newFile);
				$arrNames[] = array('file' => $name, 'error' => '');
				
			} catch (Exception $e) {
				$warn = $e->getMessage();
				$arrNames[] = array('file' => null, 'error' => $warn);
			}
		}
	}
	
	return $arrNames;
}

function getExt($fileName){
	
	$fileName = basename($fileName);
	$ext = explode('.', strtolower($fileName));
	return (count($ext) == 1)? '': end($ext);
	
}

function isSupportedExt($ext, $supportedExt) {

	return in_array($ext, $supportedExt);
}

function  convFileName($fileName) {

	$ext = '.'.getExt($fileName);
	$fileName = basename($fileName, $ext);
	$fileName = convToUri($fileName);
	$fileName = preg_replace('/[\s]{2,}/', '-', $fileName);
	return $fileName.rand(0, 1000).$ext;
}

function convToUri($name) {

	$name = transl($name);
	$name = strtolower($name);	
	$name = str_replace(' ', '-', $name); 
	$name = preg_replace('/[^-_.\w]+/', '-', $name);
	$name = preg_replace('/[-]{2,}/', '-', $name);
	return $name;
}

function transl($text) { 
        $trans = array( 
            "а" => "a",  "б" => "b", "в" => "v", 
            "г" => "g",  "д" => "d", "е" => "e", 
            "ё" => "e", 
            "ж" => "zh", 
            "з" => "z", 
            "и" => "i", 
            "й" => "y", 
            "к" => "k", 
            "л" => "l", 
            "м" => "m", 
            "н" => "n", 
            "о" => "o", 
            "п" => "p", 
            "р" => "r", 
            "с" => "s", 
            "т" => "t", 
            "у" => "u", 
            "ф" => "f", 
            "х" => "kh", 
            "ц" => "ts", 
            "ч" => "ch", 
            "ш" => "sh", 
            "щ" => "shch", 
            "ы" => "y", 
            "э" => "e", 
            "ю" => "yu", 
            "я" => "ya", 
            "А" => "A", 
            "Б" => "B", 
            "В" => "V", 
            "Г" => "G", 
            "Д" => "D", 
            "Е" => "E", 
            "Ё" => "E", 
            "Ж" => "Zh", 
            "З" => "Z", 
            "И" => "I", 
            "Й" => "Y", 
            "К" => "K", 
            "Л" => "L", 
            "М" => "M", 
            "Н" => "N", 
            "О" => "O", 
            "П" => "P", 
            "Р" => "R", 
            "С" => "S", 
            "Т" => "T", 
            "У" => "U", 
            "Ф" => "F", 
            "Х" => "Kh", 
            "Ц" => "Ts", 
            "Ч" => "Ch", 
            "Ш" => "Sh", 
            "Щ" => "Shch", 
            "Ы" => "Y", 
            "Э" => "E", 
            "Ю" => "Yu", 
            "Я" => "Ya", 
            "Ъ" => "", 
            "ъ" => "", 
            "ь" => "", 
            "Ь" => "", 
        ); 
        if(preg_match("/[А-Яа-яa-zA-Z\.]/", $text)) { 

            return strtr($text, $trans);
        } 
        else { 
            return $text;                  
        }; 
    } 