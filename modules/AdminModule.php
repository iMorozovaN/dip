<?php

namespace modules;

use engine;


class AdminModule extends engine\Module {

    public function actionIndex($app) {
    
        //include(BASEPATH.'/templates/admin.php');    
        include(BASEPATH.'/news/admin/index.php');
    }

    public function actionView($app) {
    
    
    
    }

} 