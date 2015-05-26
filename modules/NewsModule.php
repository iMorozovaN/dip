<?php

namespace modules;

use engine;
use engine\Page;

class NewsModule extends engine\Module {

    public function actionIndex($app) {
   
        require(__DIR__.'/../news/config.php');//путь к корневой папке новостей
        include(Dir.'/functions.php');

        $id = get_int_par('id_news',0);
        $arrNames = array();
        
        $page = new Page();
        
        //-----инфа для top меню-----------------------------------
        $statics = $page->getStaticPages(); 
        //var_dump($statics);

        //-----инфа для левого меню--------------------------------
        $p = array();
        $nodes = $page->getFirstLevel();
        $news = array();

        foreach ($nodes as $node) {
            $pages = $page->getArr((int)$node['ancestor'], 1);//многоуровневый массив нод
            $pagestpl[] = $page->getArr((int)$node['ancestor'], 1);
            
            $p[] = $page->viewListPages($pages, 'mainPage', 'subPage','index.php?module=public&cmd=index&page_id=', 0);
        }
       /*echo ('<xmp>');
        print_r($pagestpl);
        echo ('</xmp>');
        exit;*/
        //$styleFromFile = '/css/style.css';//treestyle.css выведет с отступами

        // если есть страница - вывести ее данные в форме
        if ($page_id = $app->getStrParam('page_id')) {

            $news = $page->readById($page_id);
        } else {
            $page_id = '24';
            $news = $page->readById($page_id);
        }
        //--------------------------------------------------------

        if($id){
        $news = readById($id); //кортеж по id
        foreach($news as $row) {
            $pagetitle = "Новости";
            //$styleFromFile = "/news/css/style.css";
            $styleFromFile = "/css/styleForPublicNewsList.css";
            $importStile = "/news/css/newsstyle.css";
            $arrNames = json_decode($row['arrImg']);
            $date = date("j.m.Y", strtotime($row['date']));
            $pathToTemp = Dir.'/templates/tpl_news.php';
            //include(BASEPATH.'/templates/publicIndexNews.php');
            include(BASEPATH.'/templates/publicIndexNewsBootstrap.php');
        }
        }
        else{

        //--формирование списка-----------------------
            $total = strCount(); //всего записей в таблице
            $pg = get_int_par('page', 1);//текущая стр
            $pg = checkCurrentPage($pg, $total, $num_elements);
            $start = ($pg - 1) * $num_elements; //Стартовая позиция выборки из БД
            $news = read($start, $num_elements);//массив новостей для текущей страницы
        //--------------------------------------------
            $nav = getNavPublic($pg, $total, "/index.php?module=news&cmd=index");//постраничная навигация

            $pagetitle = "Новости";
            $styleFromFile = "/css/styleForPublicNewsList.css";
            $pathToTemp = Dir.'/templates/tpl_index.php';
       
            //include(BASEPATH.'/templates/publicIndexNews.php');
            include(BASEPATH.'/templates/publicIndexNewsBootstrap.php');
        }
    }
}
