<?php
	header('Content-Type: text/html; charset=utf-8');
	require(__DIR__.'/../config.php');//путь к корневой папке сайта 
	include(Dir.'/admin/func.php');
	connect($host, $username, $password, $db_name); 
	
class Page{

	public $warn = '';// предупреждение об ошибках методов

	public function searchParent($id) {
		
			$query = "SELECT * FROM `pages` p
				JOIN `pages_treepath` t ON (p.id = t.ancestor)
				WHERE t.descendant = '$id'";
			$res = mysql_query($query);	
			while ($row = mysql_fetch_assoc($res))
				$data[] = $row;	
			if ( count($data)>1 ) return $data; 
		return false;	
	}

    public function create($parent, $title, $text,  $visible = true) {
		
		$query = "SELECT * FROM `pages` p  WHERE id = '$parent'";
		$res = mysql_query($query);	
		while ($row = mysql_fetch_assoc($res))
			$data[] = $row;	
		$level = 1;
		if ($data) $level = 2; // если строка в БД не пустая
		
		$title = mysql_real_escape_string($title);
		$text = mysql_real_escape_string($text);
		
		if ( $this -> searchParent($parent) ) { // есть предок - предупреждение: уровень вложенности превышен
			$this->warn = 'Нельзя добавлять 3й уровень вложенности';
			return false;
		}
		
		$query = "INSERT INTO `pages` VALUES ( NULL, '$title', '$text', '".(int)$visible."', NULL, NOW());";
		mysql_query($query);
		$currentId = mysql_insert_id();
		
		if (!$currentId) { 
			$this->warn = 'error при добавлении в БД';
			return false;
		}
		
		$query = "INSERT INTO `pages_treepath` (ancestor, descendant, level)
					SELECT ancestor, '$currentId', '$level' FROM `pages_treepath`
					WHERE descendant = '$parent'
				UNION ALL 
				SELECT '$currentId', '$currentId', '$level';";
			
		mysql_query($query);
		if(mysql_errno()) { 
			$this->warn = mysql_error();
			return false;
		}
		
		return $currentId;
    }
	
	public function remove($id) {
	
		$query = "DELETE FROM `pages`
					WHERE id IN (
						SELECT descendant FROM (
							SELECT descendant FROM pages p
							JOIN pages_treepath t ON p.id = t.descendant
							WHERE t.ancestor = '$id'
						) AS tmptable);";
		mysql_query($query);
		if(mysql_errno()) { 
			$this->warn = mysql_error();
			return false;
		}
		
		$query = "DELETE FROM `pages_treepath`
					WHERE descendant IN (
						SELECT descendant FROM (
							SELECT descendant FROM pages_treepath
							WHERE ancestor = '$id'
						) AS tmptable);";
        mysql_query($query);
		if(mysql_errno()) { 
			$this->warn = mysql_error();
			return false;
		}
		return true;
    }
	
	public function readById($id) {
	
		$id = (int)$id;
		$query = "SELECT * FROM `pages` WHERE id='$id';";
		$res = mysql_query($query);
		
		$data = array();
		if (!mysql_num_rows($res)) return $data;
		
		while ($row = mysql_fetch_assoc($res))
			$data[] = $row;	
		
		return $data;
    }
	
	//Выборка дочерних элементов:
	public function readTree($id, $carrent = 1) {
	
		$query = "SELECT * FROM `pages` p
				  JOIN `pages_treepath` t ON (p.id = t.descendant)
				  WHERE t.ancestor = '$id';";
		$res = mysql_query($query);
		
		$data = array();
		while ($row = mysql_fetch_assoc($res))
			$data[] = $row;	
			
		if (!$carrent) {
			unset($data[0]);
		}
		return $data;
    }
	
	public function update($id, $title, $text, $visible = true) {
	
		$title = mysql_real_escape_string($title);
		$text = mysql_real_escape_string($text);
		
		$query = "UPDATE `pages` SET title='$title', text='$text', `visible`='".(int)$visible."'WHERE id='$id';";
		mysql_query($query);

		if(mysql_errno()) { 
			$this->warn = mysql_error();
			return false;
		}
		$res = mysql_affected_rows() ; // mysql_affected_rows() не обновит колонки, уже содержащие новое значение, вернет 0
		if ($res == -1)  { 
			$this->warn = 'Запрос не выполнен';
			return false;
		}
		return $res;
    }
	
}

	$title = '111';
	$text = '111'; 

	$page = new Page();
	
	//if (!$page->create(, $title, $text))
	//echo $page->warn;// 1й параметр - ancestor from table pages_treepath
	
	//$page->remove(17); // передавать id удаляемой страницы, удаляются и дочерние
	//$page->readById(2);// строка из таблицы pages
	
	print_r($page->readTree(25));// Выборка дочерних страниц, включая указанный id
	
	//$page -> update(16, $title, $text);
	//$page ->searchParent(id);
	
	//echo '<xmp>';
	// http://janiwanow.com/blog/closure-table-part-1/
	

	
	