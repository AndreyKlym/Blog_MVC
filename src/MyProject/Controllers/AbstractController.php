<?php

namespace MyProject\Controllers;

use MyProject\Models\Users\User;
use MyProject\Models\Users\UsersAuthService;
use MyProject\View\View;

abstract class AbstractController
{
    /** @var View*/
    protected $view;

    /** @var User|null*/
    protected $user;

    public function __construct()
    {
        $this->user = UsersAuthService::getUserByToken();
        $this->view = new View(__DIR__ . '/../../../templates');
        $this->view->setVar('user', $this->user);
        //        свойства user и view теперь с типом protected – они будут доступны в наследниках.

    }

    //    вынесем функционал чтения входных данных в абстрактный контроллер:
    protected function getInputData()
    {
        return json_decode(
            file_get_contents('php://input'),
            true
        );
    }

}