<?php

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

       } else { $this->controller = 'Home_control';}
       
       require_once(_CONTROLLER_.$this->controller.'.php');
       $this->controller = new $this->controller;
       
       if (isset($url[1]))
       {
           if( method_exists($this->controller, $url[1]))
           {
               $this->method = $url[1];
               unset($url[1]);
           }else { 
               header( "refresh:5;url=/forteroche/app/Home/show" ); 
               echo '
               <div style="height:100%; width:100%; background-image: linear-gradient(to right top, #6c8bbb, #23add1, #04ccc2, #84e297, #ebeb74);; box-shadow: 0px 0px 25px grey; border-radius:15px;display:flex;justify-content:center;align-items:center;">
                    <div style="color:white; box-shadow: 0px 0px 25px grey;padding:100px;;font-family: \'Poiret One\', cursive;border-radius:15px;display:block;margin:auto;background-image: linear-gradient(to right top, #6c8bbb, #9f78af, #c36482, #c06647, #947813);">
                        <h1 style="font-size:4em;">Oups...</h1>
                        <p style="font-size:2em;">Il semblerait que la page demandé n\'a pu être trouvée. Vous serez redirigé automatiquement à l\'accueil dans quelques secondes...</p>
                        <p style="color:purple;font-size:1em; font-style:italic;">Si ce n\'est pas le cas, cliquez sur <a href="https://benhammouda-amir.yo.fr/forteroche/app/Home/show">FORTEROCHE LIVE</a></p>
                    </div>
            </div>';
            }

       } else { 
            header( "refresh:5;url=/forteroche/app/Home/show" ); 
            echo '
            <div style="height:100%; width:100%; background-image: linear-gradient(to right top, #6c8bbb, #23add1, #04ccc2, #84e297, #ebeb74);; box-shadow: 0px 0px 25px grey; border-radius:15px;display:flex;justify-content:center;align-items:center;">
                <div style="color:white; box-shadow: 0px 0px 25px grey;padding:100px;;font-family: \'Poiret One\', cursive;border-radius:15px;display:block;margin:auto;background-image: linear-gradient(to right top, #6c8bbb, #9f78af, #c36482, #c06647, #947813);">
                    <h1 style="font-size:4em;">Oups...</h1>
                    <p style="font-size:2em;">Il semblerait que la page demandé n\'a pu être trouvée. Vous serez redirigé automatiquement à l\'accueil dans quelques secondes...</p>
                    <p style="color:purple;font-size:1em; font-style:italic;">Si ce n\'est pas le cas, cliquez sur <a href="https://benhammouda-amir.yo.fr/forteroche/app/Home/show">FORTEROCHE LIVE</a></p>
                </div>
            </div>';
     }
       
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