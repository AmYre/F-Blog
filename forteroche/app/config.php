<?php
    error_reporting(E_ALL);

class My_autoload
{
    public static function start()
    {
        spl_autoload_register(array(__CLASS__, 'autoload'));

        $root = $_SERVER['DOCUMENT_ROOT'];
        $host = $_SERVER['HTTP_HOST'];

        define('_ROOT_', $root.'/forteroche/app/');
        define('_HOST_', $host.'/forteroche/app/');
        define('_PUB_', $host.'/forteroche/');

        define('_MODEL_', _ROOT_.'model/');
        define('_CONTROLLER_', _ROOT_.'controller/');
        define('_VIEW_', _ROOT_.'view/');
        define('_CLASSES_', _ROOT_.'classes/');

        define('_PUBLIC_', _PUB_.'public/');
    }

    public static function autoload($class)
    {
        
        if(file_exists(_CONTROLLER_.$class.'.php'))
        {
            include_once (_CONTROLLER_.$class.'.php');
        } 
        else if ( file_exists(_CLASSES_.$class.'.php'))
        {
            include_once (_CLASSES_.$class.'.php');
        } 
        else if ( file_exists(_MODEL_.$class.'.php'))
        {
            include_once (_MODEL_.$class.'.php');
        }
    } 

}


?>