<?php

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