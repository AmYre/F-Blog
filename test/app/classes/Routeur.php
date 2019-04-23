<?php

class Routeur {
    
    private $routes = 
    [
        "home" => ["controller" => 'Home_control', "method" => 'show_home'],
        "chapter_manager" => ["controller" => 'Chapter_manager_control', "method" => 'show_manager'],
        "chapter_manager_sent" => ["controller" => 'Chapter_manager_control', "method" => 'updateANDdelete_chapter'],
        "create" => ["controller" => 'Create_control', "method" => 'show_create'],
        "create_sent" => ["controller" => 'Create_control', "method" => 'checkANDregister'],
        "listing" => ["controller" => 'Listing_control', "method" => 'show_listing'],
        "write" => ["controller" => 'Write_control', "method" => 'show_write'],
        "write_sent" => ["controller" => 'Write_control', "method" => 'insert_chapter'],
        "reading" => ["controller" => 'Reading_control', "method" => 'show_reading'],
        "reading_sent" => ["controller" => 'Reading_control', "method" => 'insert_comment'],
        "connexion" => ["controller" => 'Connexion_control', "method" => 'show_connexion'],
        "connexion_sent" => ["controller" => 'Connexion_control', "method" => 'check_info'],
        "tchat" => ["controller" => 'Tchat_control', "method" => 'show_tchat'],
        "tchat_sent" => ["controller" => 'Tchat_control', "method" => 'insert_tchat'],
        "user" => ["controller" => 'User_control', "method" => 'show_user'],
    ];

    public function __construct ()
    {
       $url = $this->routing();
       
       if(key_exists($url[0], $this->routes))
        {
            $controller = $this->routes[$url[0]]['controller'];
            $method = $this->routes[$url[0]]['method'];

            $instanceController = new $controller();
            $instanceController->$method();
        } else {echo 'NOT FOUND error 404';}

    }

    public function routing ()
    {
        if (isset ($_GET['url']))
        {
            return $url = explode('/', filter_var( rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
    }
    
}
 