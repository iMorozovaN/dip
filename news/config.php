<?php 
	define("Dir", __DIR__);
	
	$num_elements = 4; // �������� �� ��������
	//$numchar=400;//���������� �������� � ������
	//$num_elements_admin = 4; // 
	$host = "localhost";
	$username = "root";
	$password = "";
	$db_name = "news_site";
	$date=date("Y-m-d H:i:s");
	
	$imgDir = '/news/img/';
	$savePath = Dir.DIRECTORY_SEPARATOR.'img';
	$fieldName = 'pictures';
	$supportedExt = array('bmp', 'jpg', 'jpeg', 'png', 'gif');