<?php

namespace MyProject\View;

class View{

    private $templatesPath;

    private $extraVars = [];

    public function __construct(string $templatesPath){
        $this -> templatesPath = $templatesPath;
    }

    //сделаем во View возможность добавлять переменные (пользователя) еще перед рендерингом
    public function setVar(string $name, $value): void
    {
        $this->extraVars[$name] = $value;
    }

    public function renderHtml(string $templateName, array $vars = [], int $code = 200){
        // var_dump($vars);    // array with atrcles (title + text)
        http_response_code($code);

        extract($this->extraVars);
        extract($vars);

        ob_start();
//        include $this-> templatesPath . '/www/' . $templateName;
        include $this-> templatesPath . '/' . $templateName;
        $buffer = ob_get_contents();
        ob_get_clean();

        echo $buffer;
        
    }

    public function displayJson($data, int $code=200)
    {
        header('Content-type: application/json; charset=utf-8');
        http_response_code($code);
//        echo json_encode($data);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }
}