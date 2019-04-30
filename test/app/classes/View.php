<?php

class View
{
    private $template;

    public function __construct($template)
    {
        $this->template = $template;
    }

    public function show($params = array())
    {
        extract($params);

        $template = $this->template;
        require(VIEW.$template.'.php');
    }
}