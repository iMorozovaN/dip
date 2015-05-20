<?php

namespace engine;

class AuthManager {

    protected $sessionKey = 'userauth';
    
    protected $logged = false;
    
    public function __construct() {
        $this->logged = false;
        
    }
    
    public function isLogin() {
    
        return isset($_SESSION[$this->sessionKey]) && $_SESSION[$this->sessionKey];
        
    }
    
    public function login($user, $pass) {
        
        global $config;
    
        if($user != $config['user']) return false;
        if($pass != $config['pass']) return false;
    
        $_SESSION[$this->sessionKey] =  1;
    
        $this->logged = true;
        
        return true;
    
    }
    
    public function logout() {
    
        unset($_SESSION[$this->sessionKey]);
    }
    

}