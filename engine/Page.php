<?php
namespace engine;

class Page{
    /**
     * @var string
     */
	public $warn = '';// предупреждение об ошибках методов

    public function getParentIdByName($parentName){

        $query = "SELECT id FROM `pages` WHERE title='$parentName'";
        $res = mysql_query($query);
        $data = array();
        while ($row = mysql_fetch_assoc($res))
            $data[] = $row;
        if ( count($data)>=1 ) return $data[0];
        return false;

    }


    public function searchParent($id) {

        $data = array();
        $query = "SELECT * FROM `pages` p
				JOIN `pages_treepath` t ON (p.id = t.ancestor)
				WHERE t.descendant = '$id'";
        $res = mysql_query($query);
        while ($row = mysql_fetch_assoc($res))
            $data[] = $row;
        if ( count($data)>=1 ) return $data;
        return false;

    }
    //вложенный массив страниц
	public function getArr($id, $level) {
	
		$arr = array();
		$dauthers = array();
		
		$arr = $this->readById($id);
		
		//выбрать прямых дочек--------
		$query = "SELECT descendant, level FROM `pages_treepath` as t
				WHERE t.ancestor = '$id'
				AND	t.level = '$level'+1 ;";
		$res = mysql_query($query);
		
		if(mysql_errno()) throw new \ErrorException(mysql_error());
		while ($row = mysql_fetch_assoc($res))
			$dauthers[] = $row;
		//-----------------------------
		
		if ($dauthers) foreach ($dauthers as $node) {

			$arr['items'][]= $this->getArr($node['descendant'], $node['level']);
		}

		return $arr;
	}

    function viewListPages($arNodes, $ulClass, $liClass, $href = 'index.php?module=pages&cmd=edit&page_id=', $del ='true') {

        $output = '<ul class="' . $ulClass . '">';
        $output .= '<li class="' . $liClass . '"><a href="' . $href . $arNodes['id'] . '">' . $arNodes['title'] . '</a>';
        if ($del) $output .= '<a href="index.php?module=pages&cmd=delete&page_id='. $arNodes['id'] .'" onClick="if(confirm(\'Вы уверены, что хотите удалить? (дочерние разделы будут удалены)\')) return true; else return false;"> [X] </a>';

        if (isset($arNodes['items'])) {

            foreach ($arNodes['items'] as $node) {
                if (!$del) $output .= $this->viewListPages($node, 'mainPage', 'subPage','index.php?module=public&cmd=index&page_id=', 0);
                else $output .= $this->viewListPages($node, 'mainPage', 'subPage');
            }
        }
        $output .= '</li>';
        $output .= '</ul>';

        return $output;
    }

	public function getRootId() {
	
		$query = "SELECT MIN(`id`) as root_id FROM `pages`;";
		$res = mysql_query($query);
		if(mysql_errno()) throw new \ErrorException(mysql_error());
		
		if(!mysql_num_rows($res)) throw new \ErrorException('Root page does not exist');
		
		$root = mysql_fetch_assoc($res);
		
		return (isset($root['root_id']) && is_int((int)$root['root_id']) && $root['root_id']) ? $root['root_id']: false;
		
	}

    public function getParents(){

        $query = "SELECT * FROM `pages_treepath` t
        JOIN `pages` p ON
        (t.ancestor = p.id)
         WHERE level = '1' AND `p`.`static` = '0'
        ;";
        $data = array();

        $res = mysql_query($query);
        if(mysql_errno()) throw new \ErrorException(mysql_error());
        if(!mysql_num_rows($res))  return $data;

        while ($row = mysql_fetch_assoc($res)) {
            $data[] = $row;
        }
        return $data;

    }
	
    public function create($parent, $title, $text,  $visible = true) {

        $data = array();
		$query = "SELECT * FROM `pages` p  WHERE id = '$parent'";
		$res = mysql_query($query);	
		while ($row = mysql_fetch_assoc($res))
			$data[] = $row;	
		$level = 1;
		if ($data) $level = 2; // если строка в БД не пустая
		if (!get_magic_quotes_gpc()) {
			$title = mysql_real_escape_string($title);
			$text = mysql_real_escape_string($text);
		}
		$res = $this->searchParent($parent);
		if (count($res)>1 ) { // есть предок - предупреждение: уровень вложенности превышен

            throw new \InvalidArgumentException('Нельзя добавлять 3й уровень вложенности!');
		}

        $query = "INSERT INTO `pages` VALUES ( NULL, '$title', '$text', '".(int)$visible."', NULL, NOW(), '0');";
		mysql_query($query);
		$currentId = mysql_insert_id();
		
		if (!$currentId) {

            throw new \ErrorException('error при добавлении в БД');
		}

		$query = "INSERT INTO `pages_treepath` (ancestor, descendant, level)
					SELECT ancestor, '$currentId', '$level' FROM `pages_treepath`
					WHERE descendant = '$parent'
				UNION ALL 
				SELECT '$currentId', '$currentId', '$level';";
			
		mysql_query($query);
		if(mysql_errno()) {

            throw new \ErrorException(mysql_error());
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

            throw new \ErrorException(mysql_error());
		}
		
		$query = "DELETE FROM `pages_treepath`
					WHERE descendant IN (
						SELECT descendant FROM (
							SELECT descendant FROM pages_treepath
							WHERE ancestor = '$id'
						) AS tmptable);";
        mysql_query($query);
		if(mysql_errno()) {

            throw new \ErrorException(mysql_error());
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
			$data = $row;	
		
		return $data;
    }
	
	//Выборка дочерних элементов($id, возвращать родительсткий элемент ветки или нет)
	public function readSubtree($id, $carrent = 1) {
 		
		$query = "
			SELECT * FROM `pages` p
			JOIN `pages_treepath` t ON (p.id = t.descendant)
			WHERE t.ancestor = '$id'; ";
		$res = mysql_query($query);
        if(mysql_errno()) {

            throw new \ErrorException(mysql_error());
        }
		$data = array();
		
		while ($row = mysql_fetch_assoc($res)) {
			$data[] = $row;
		}
			
		if (!$carrent) {
			unset($data[0]);
		}
		
		return $data;
    }
	
	public function getFirstLevel() { 
		
		$query = "
			SELECT 
				* 
			FROM `pages` p
			JOIN `pages_treepath` t ON (p.id = t.descendant)
			WHERE 
			`t`.`level` = '1' AND `p`.`static` = '0';";
		$res = mysql_query($query);
        if(mysql_errno()) {

            throw new \ErrorException(mysql_error());
        }

		$data = array();
		while ($row = mysql_fetch_assoc($res))
			$data[] = $row;	
			
		return $data;
	}

	public function getStaticPages(){


		$query = "
			SELECT 
				* 
			FROM `pages` p
			
			WHERE 
			`p`.`static` = '1';";
		$res = mysql_query($query);
        if(mysql_errno()) {

            throw new \ErrorException(mysql_error());
        }

		$data = array();
		while ($row = mysql_fetch_assoc($res))
			$data[] = $row;	
			
		return $data;
	}

	public function update($id, $title, $text, $visible = true) {

       if (!get_magic_quotes_gpc()) {
			$title = mysql_real_escape_string($title);
	    	$text = mysql_real_escape_string($text);
	    }
		
		$query = "UPDATE `pages` SET title='$title', text='$text', `visible`='".(int)$visible."'WHERE id='$id';";
		mysql_query($query);

		if(mysql_errno()) {

            throw new \ErrorException(mysql_error());
		}
		$res = mysql_affected_rows() ; // mysql_affected_rows() не обновит колонки, уже содержащие новое значение, вернет 0
		if ($res == -1)  {

            throw new \InvalidArgumentException('Запрос не выполнен');
		}
		return $res;
    }

    // move2NewParent(что переезжает, куда, {инфа о переезжающем})
    public function move2NewParent($id, $newParent, $title, $text) {

        if ($this->readSubtree($id, 0))
            throw new \InvalidArgumentException('нельзя переносить страницу, имеющую дочерние, на второй уровень!');


        // удалить в pages_treepath по descendant'у
        $query = "DELETE FROM `pages_treepath`
					WHERE descendant IN (
						SELECT descendant FROM (
							SELECT descendant FROM `pages_treepath`
							WHERE ancestor = '$id'
						) AS tmptable);";
        mysql_query($query);
        if(mysql_errno()) {

            throw new \ErrorException(mysql_error());
        }
        // добавить в pages_treepath с новым парентом
        $query = "INSERT INTO `pages_treepath` (ancestor, descendant, level)
					SELECT ancestor, '$id', '2' FROM `pages_treepath`
					WHERE descendant = '$newParent'
				UNION ALL
				SELECT '$id', '$id', '2';";

        mysql_query($query);
        if(mysql_errno()) {

            throw new \ErrorException(mysql_error());
        }

        $res = mysql_affected_rows();// Возвращает количество рядов, затронутых последним INSERT, UPDATE,  DELETE запросом
        if ($res == -1)  {

            throw new \ErrorException('Error при обращении к БД');
        }

        return $res;
    }
    //moveTo0level(что переезжает)
    public function moveTo0level($id){

        // удалить в pages_treepath по descendant'у
        $query = "DELETE FROM `pages_treepath`
					WHERE descendant IN (
						SELECT descendant FROM (
							SELECT descendant FROM `pages_treepath`
							WHERE ancestor = '$id'
						) AS tmptable);";
        mysql_query($query);
        if(mysql_errno()) {

            throw new \ErrorException(mysql_error());
        }

        // добавить в pages_treepath (id,id,1)
        $query = "INSERT INTO `pages_treepath`  VALUES ( NULL, '$id', '$id', 1);";

        mysql_query($query);
        if(mysql_errno()) {

            throw new \ErrorException(mysql_error());
        }
        $res = mysql_affected_rows();// Возвращает количество рядов, затронутых последним INSERT, UPDATE,  DELETE запросом
        if ($res == -1)  {
            throw new \ErrorException('Error при обращении к БД');
        }

        return $res;
    }
	
}