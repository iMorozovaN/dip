<?php

namespace modules;

use engine;

class TestModule extends engine\Module {

    public function actionIndex($app) {
    
        include(BASEPATH.'/templates/main.php');    
    }

    public function actionView($app) {
    
    
    
    }

} 