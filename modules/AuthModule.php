<?php

namespace modules;

use engine;

class AuthModule extends engine\Module {


    public function actionIndex($app) {
    
        $login = $app->getStrParam('login', '');    
        $pass = $app->getStrParam('password', '');    
    
        if(!$app->getAuthManager()->login($login, $pass))
            include(BASEPATH.'/templates/loginForm.php');
        else
            header("Location: /admin/");
    }
    
    
    public function actionLogout($app) {
    
        $app->getAuthManager()->logout();
        header("Location: /admin/");
    
    }

} 