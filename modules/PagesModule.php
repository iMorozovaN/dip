<?php

namespace modules;

    use engine;
    use engine\Page;

class PagesModule extends engine\Module {

    public function actionIndex($app) {

        $page = new Page();
        $p = array();
        $nodes = $page->getFirstLevel();

		foreach ($nodes as $node) {
			$pages = $page->getArr((int)$node['ancestor'], 1);//многоуровневый массив нод 

			$p[] = $page->viewListPages($pages, 'mainPage', 'subPage');
		}

       $staticPages = $page->getStaticPages();

        $styleFromFile = '/css/treestyle.css';
        $adr = '/admin/index.php';
        $tip = 'назад';
        $link = '<< Вернуться в панель управления';
        $titlePage = "Страницы левого меню:";
        //$title1 = "Страницы левого меню:";
        $title2  = "Страницы верхнего меню:";
		include(BASEPATH.'/templates/pageTree.php');
    }

    public function actionDelete($app){

        $page = new Page();

        // если есть страница - удаляем
        if ($page_id = $app->getStrParam('page_id'))
            $page->remove($page_id);
        ?>

        <script type="text/javascript" >
            window.location.href='/admin/index.php?module=pages&cmd=index';
        </script>

    <?php

    }

    public function actionEdit($app){

        $page = new Page();

        $news = array();
        $news['id'] = '';
        $news['title'] = '';
        $news['text'] = '';
        $styleFromFile = '/css/style.css';
        $adr = '/admin/index.php?module=pages&cmd=index';
        $tip = 'к списку страниц';
        $link = '<< Вернуться к списку страниц';
        $titlePage = 'Редактирование содержимого страницы';
        $action="/admin/index.php?module=pages&cmd=edit";
        $warning = '';
        $page_id = '';
        $parent_title = 'Выбрать родительскую ветку';
        $node = '';
        $parents = array();
        $flag = false;

        // если есть страница - вывести ее данные в форме
        if ($page_id = $app->getStrParam('page_id')) {

            //забрать страницу по id и выяснить ее парента
            $news = $page->readById($page_id);

            $id_parent = $page->searchParent($page_id);
            $id_parent = $id_parent[0]['ancestor'];

            $parent_title = $page->readById($id_parent);
            $parent_title = $parent_title['title'];

        }

         //выбрать parent'ов
          $parents = $page->getParents();
        
         // если форма отправлена - добавить/изменить
         if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {
            $page = new Page();
            //выцепить ид переданного из формы парента
            $idParent = $_POST['parents'];
            try {

                if ($app->getStrParam('change'))
                    if ($page_id) {

                        $node = $page->update($_POST['page_id'], $_POST['title'], $_POST['text']);
                        if ($id_parent != $_POST['parents'])
                            if ( $_POST['parents'] == '0') $page->moveTo0level($_POST['page_id']);
                            else $page->move2NewParent($_POST['page_id'], $idParent, $_POST['title'], $_POST['text']);
                    } else
                        $node = $page->create($idParent, $_POST['title'],  $_POST['text'],  $visible = true);

                //ошибка добавления в БД:
                /*if (is_string($node)  && !empty($node)) {
                    $warning = $node;
                    include(BASEPATH.'/templates/editPage.php');
                    exit;
                }*/

            } catch(\InvalidArgumentException $e) {

                $warning = $e->getMessage();
                include(BASEPATH.'/templates/editPage.php');
                exit;

            }

            ?>

            <script type="text/javascript" >
                window.location.href='/admin/index.php?module=pages&cmd=index';
            </script>
            <?php
        }
        include(BASEPATH.'/templates/editPage.php');

    }

    public function actionView($app) {
    
    
    }

} 