<?php

namespace MyProject\View;

class View{

    private $templatesPath;

    public function __construct(string $templatesPath){
        $this -> templatesPath = $templatesPath;
    }

    public function renderHtml(string $templateName, array $vars = [], int $code = 200){
        // var_dump($vars);    // array with atrcles (title + text)
        http_response_code($code);
        extract($vars);

        ob_start();
        include $this-> templatesPath . '/' . $templateName;
        $buffer = ob_get_contents();
        ob_get_clean();

        echo $buffer;
        
    }
}