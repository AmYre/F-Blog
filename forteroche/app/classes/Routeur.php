<?php

    error_reporting(E_ALL);

class Routeur {

    private $controller;
    private $method;
    private $params = [];

    public function __construct ()
    {
       $url = $this->routing();
       if( file_exists(_CONTROLLER_.$url[0].'_control.php') )
       {
           $this->controller = $url[0].'_control';
           unset($url[0]);
       } else { echo'Controller NOT FOUND ';}
       
       require_once(_CONTROLLER_.$this->controller.'.php');
       $this->controller = new $this->controller;
       
       if (isset($url[1]))
       {
           if( method_exists($this->controller, $url[1]))
           {
               $this->method = $url[1];
               unset($url[1]);
           }
       } else { echo'Method NOT FOUND ';}
       
       if ($url) 
       {
            $this->params = array_values($url);
       } 

       call_user_func_array (array($this->controller, $this->method), $this->params);

    }

    public function routing ()
    {
        if (isset ($_GET['url']))
        {
            return $url = explode('/', filter_var( rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
    }
    
}