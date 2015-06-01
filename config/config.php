<?php

$config['basepath'] = dirname(__DIR__);//имя родительского каталога: Z:\home\frame.ru\www

$config['default_module'] = 'admin';
$config['public_default_module'] = 'public';//news
$config['default_cmd'] = 'index';

$config['auth_module'] = 'auth';
$config['auth_cmd'] = 'index';

$config['user'] = 'admin';
$config['pass'] = 'd8578edf8458ce06fbc5bb76a58c5ca4'; // алг хэширования md5

$config['dbhost'] = 'localhost'; // адрес сервера для подключения к СУБД
$config['dbname'] = 'news_site'; // Имя БД для подключения
$config['dbuser'] = 'root'; // Имя пользователя для авторизации к СУБД
$config['dbpass'] = ''; // Пароль для подключения к СУБД

$availableModules['admin'] = array('admin','auth','pages','test','question',);
$availableModules['public'] = array('public','news','question',);
 // добавить массив с допустимыми модулями


$num_elements = 4; // �������� �� ��������
$numchar=400;//���������� �������� � ������
return $config;