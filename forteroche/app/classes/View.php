<?php
   error_reporting(E_ALL);
   ini_set("display_errors", 1);  

class View
{
    private $template;

    public function __construct($template)
    {
        $this->template = $template;
    }

    public function show($param = array())
    {
        extract($param);

        $template = $this->template;
        require(_VIEW_.$template.'.php');
    }
}