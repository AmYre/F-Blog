<?php

class My_autoload
{
    public static function start()
    {
        spl_autoload_register(array(__CLASS__, 'autoload'));

        $root = $_SERVER['DOCUMENT_ROOT'];
        $host = $_SERVER['HTTP_HOST'];

        define('ROOT', $root.'/test/app/');
        define('HOST', $host.'/test/app/');
        define('PUB', $host.'/test/');

        define('MODEL', ROOT.'model/');
        define('CONTROLLER', ROOT.'controller/');
        define('VIEW', ROOT.'view/');
        define('CLASSES', ROOT.'classes/');

        define('PUBLIC', PUB.'public/');
    }

    public static function autoload($class)
    {
        if(file_exists(CONTROLLER.$class.'.php'))
        {
            include_once (CONTROLLER.$class.'.php');
        } 
        else if ( file_exists(CLASSES.$class.'.php'))
        {
            include_once (CLASSES.$class.'.php');
        } 
        else if ( file_exists(MODEL.$class.'.php'))
        {
            include_once (MODEL.$class.'.php');
        } 
    }

}


?>