<?php
define('ROOT', $_SERVER['DOCUMENT_ROOT']);

header('Content-Type: text/html; charset=utf-8');
session_start();

$config = include(__DIR__.'/../config/config.php'); // подлючаем конфиги

define('BASEPATH', $config['basepath']);// определяем базовый путь

require_once(BASEPATH.'/engine/Db.php');            # подключаем файл работы с БД
require_once(BASEPATH.'/engine/FileLoader.php');    # и автоподгрузчик   файлов с классами  см. файл /engine/FileLoader.php     
 
# соединяемся с БД
dbConnect( $config['dbhost'],
           $config['dbuser'],
           $config['dbpass'],
           $config['dbname'] );

engine\FileLoader::registerPath(BASEPATH.'/'); # инитим автолоадер, говорим ему, что искать файлы начиная с базового пути
$auth = new engine\AuthManager(); # если нужно создаем экземпляр проверялки авторизации

$app = new engine\App();    # Создаем экземпляр класса "Приложение" и вызываем его метод run
$app->setAuthManager($auth);# подключаем менеджер авторизации - после этого приложение начнет проверять авторизован ли пользователь 

$app->setAvailableModules($availableModules['admin']); //установить допустимые модули для данного индексника

$app->run();