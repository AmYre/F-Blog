<?php
    error_reporting(E_ALL);
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