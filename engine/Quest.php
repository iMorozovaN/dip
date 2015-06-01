<?php
namespace engine;

class Quest{

	public function announce($text){

	    $numchar = '150';
		$substr = substr($text,$numchar);
		$pos = strpos($substr, " "); 
		if(strlen($text)>$numchar) 
			$dot = "...";                // многоточие после анонса
		else $dot = "";
		$all=$numchar+$pos;
		$res = substr($text, 0, $all) . $dot;
		return $res;
	}

	public function addEmail($email){



		$query = "UPDATE `mail` SET mail='$email' WHERE id='1';";

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

	public function getEmail(){

		
		$query = "SELECT `mail` FROM `mail` WHERE id='1';";
		$res = mysql_query($query);
		
		$data = array();
		if (!mysql_num_rows($res)) return $data='';
		
		while ($row = mysql_fetch_assoc($res))
			$data = $row;	

		$data = $data['mail'];
		return $data;
	}

	public function getQuestById($id){

		$id = (int)$id;
		$query = "SELECT * FROM `question` WHERE id=$id;";
		$res = mysql_query($query);
		
		$data = array();
		if (!mysql_num_rows($res)) return $data;
		
		while ($row = mysql_fetch_assoc($res))
			$data = $row;	
		return $data;
	}

	public function update($id, $quest, $answer, $visible){

		  if (!get_magic_quotes_gpc()) {
			$quest = mysql_real_escape_string($quest);
	    	$answer = mysql_real_escape_string($answer);
	    }

	    if ($visible=='on') $visible = 1;
	    else $visible = 0;

	    $query = "UPDATE `question` SET question='$quest', answer='$answer', `visible`='".(int)$visible."'WHERE id='$id';";
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


     public function read(){

		$query = "SELECT * FROM `question`;";
	    $res = mysql_query($query);
	            
	    $data = array();
	    if (!mysql_num_rows($res)) return $data;

	    while ($row = mysql_fetch_assoc($res))
	       $data[] = $row;  

	    return $data;
    }

     public function remove($quest_id){

     	$query = "DELETE FROM `question` WHERE id = '$quest_id';";
     	mysql_query($query);

		if(mysql_errno()) {

            throw new \ErrorException(mysql_error());
		}

	return true;	
    }
}