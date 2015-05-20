<?php

namespace modules;

use engine;
use engine\Page;
use engine\Quest;

class QuestionModule extends engine\Module {

    public function actionIndex($app) {
       
        //публичка
        $page = new Page();
        $question = new Quest();
        //-----инфа для top меню-----------------------------------
        $statics = $page->getStaticPages(); 
        //---------------------------------------------------------
        $p = array();
        $nodes = $page->getFirstLevel();
        $content = array();

        foreach ($nodes as $node) {
            $pages = $page->getArr((int)$node['ancestor'], 1);//многоуровневый массив нод
            $p[] = $page->viewListPages($pages, 'mainPage', 'subPage','index.php?module=public&cmd=index&page_id=', 0);
        }

        $styleFromFile = '/css/styleForPublic.css';//treestyle.css выведет с отступами

        // если есть страница - вывести ее данные в форме
        if ($page_id = $app->getStrParam('page_id')) {

            $content = $page->readById($page_id);
        } 

        $data = $question->read();

        $pathToTemp = __DIR__.'/../form/index.php';
        include(BASEPATH.'/templates/publicIndexQuestion.php'); 
    }

     public function actionAdmin($app) {

        $question = new Quest();
        $warning = '';

        if ($_GET["quest_id"]){


            $styleFromFile = '/css/style.css';
            $adr = '/admin/index.php?module=question&cmd=admin'; 
            $tip = 'назад';
            $link = '<< Вернуться в панель управления';
            $titlePage = 'Ответить на вопрос';
            $action = '/admin/index.php?module=question&cmd=admin';
            $quest = $question->getQuestById($_GET['quest_id']); 
            
            include(BASEPATH.'/templates/questionForm.php');

        } else {

            $styleFromFile = '/css/style.css';
            $adr = '/admin/index.php'; 
            $tip = 'назад';
            $link = '<< Вернуться в панель управления';
            $titlePage = 'Вопросы пользователей';
           
            if ($_POST["quest_id"]) {

                $id = (int)$_POST["quest_id"];
                $author = $_POST["author"];
                $quest = $_POST["question"];
                $mail = $_POST["mail"];
                $answer = $_POST["answer"];
                $visible = $_POST["visible"];

                try {
                     $question->update($id, $quest, $answer, $visible);
                } catch(\InvalidArgumentException $e) {

                $warning = $e->getMessage();
                include(BASEPATH.'/templates/questionForm.php');
                exit;

                }

            }


        $data = $question->read();   
        include(BASEPATH.'/templates/questionList.php');
        }
    }

      public function actionDelete($app) {

        $question = new Quest();

        if ( $quest_id = $_GET['quest_id']){
            
            echo $question->remove($quest_id);
            
        }
        ?>

        <script type="text/javascript" >
            window.location.href='/admin/index.php?module=question&cmd=admin';
        </script>

    <?php
      }
}