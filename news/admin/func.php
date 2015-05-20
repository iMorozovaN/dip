<?php function connect($host, $username, $password, $db_name){
	$link = mysql_connect($host, $username, $password);
	if(!$link){
		include(Dir.'/templates/db_conn.php');
		exit;
	}
	mysql_select_db($db_name, $link);
	mysql_query("SET NAMES utf8 COLLATE utf8_general_ci"); // SET NAMES utf8 COLLATE utf8_general_ci - для представления 
	                                                       //кодировки соединения (colation_connection) отличного от дефолтного
}