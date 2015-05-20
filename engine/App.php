<?php

namespace engine;

class App {

    protected $authManager = null;

    protected $availableModules;

    public function getStrParam($name, $default = null) {
        
        $result = (isset($_GET[$name]))  ? $_GET[$name] :
                     (isset($_POST[$name]) ? $_POST[$name]: $default);
					
                    
        return get_magic_quotes_gpc()? stripslashes($result): $result;
        
    }

    public function getIntParam($name, $default = null) {
    
        $result = (int)(isset($_GET[$name])? $_GET[$name]:
                    (isset($_POST[$name])? $_POST[$name]: $default));
    
    }

    //нужно ли использовать менеджер авторизаци:
    public function setAuthManager(AuthManager $auth) {
    
        return $this->authManager = $auth;
    }

    public function getAuthManager() {
    
        return $this->authManager;
    }

    public function setAvailableModules($modules) {

        $this->availableModules = $modules;

    }

    /**
     *
     */
    public function run() {

        global $config;
    
        try {

            if (in_array('public', $this->availableModules))
                $module = $this->getStrParam('module', $config['public_default_module']);
            else
                $module  = $this->getStrParam('module', $config['default_module']);
            $command = $this->getStrParam('cmd', $config['default_cmd']);



            if(!is_null($this->authManager)) {
                if(!$this->authManager->isLogin()) {
                    $module  = $config['auth_module'];
                    $command = $config['auth_cmd']; 
                }
            }

            $moduleClass = 'modules\\'.ucfirst(strtolower($module)).'Module';
          
            $methodName  = 'action'.ucfirst(strtolower($command));

            if(!class_exists($moduleClass) || !in_array($module, $this->availableModules) )
                throw new \ErrorException("Такого модуля не существует: [$moduleClass] или он запрещен");
            
            $с = new $moduleClass(); 
                    
            if(!method_exists($с, $methodName))
                throw new \ErrorException("Такой страницы(метода) не существует: [$methodName]");
            
            echo call_user_func_array(array($с, $methodName), array($this));


        } catch(\Exception $e) {
            $this->error($e->getMessage(), $e->getCode());
        }
        
    }
    
    public function error($msg= '', $code = 404) {
    
        include(BASEPATH.'/templates/error.php');
        exit;
    
    }

}