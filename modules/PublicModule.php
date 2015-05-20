<?php

namespace modules;

use engine;
use engine\Page;

class PublicModule extends engine\Module {

    public function actionIndex($app) {

        $page = new Page();

        $p = array();
        $nodes = $page->getFirstLevel();

        $statics = $page->getStaticPages(); 

        $content = array();

        foreach ($nodes as $node) {
            $pages = $page->getArr((int)$node['ancestor'], 1);//многоуровневый массив нод
            $p[] = $page->viewListPages($pages, 'mainPage', 'subPage','index.php?module=public&cmd=index&page_id=', 0);
        }

        $styleFromFile = '/css/styleForPublic.css';//treestyle.css выведет с отступами

        // если есть страница - вывести ее данные в форме
        if ($page_id = $app->getStrParam('page_id')) {

            $content = $page->readById($page_id);
        } //else {
         //   $page_id = '24';
         //   $content = $page->readById($page_id);
        //}

        include(BASEPATH.'/templates/publicIndex.php');
        
    }


}