<?php

namespace MyProject\Controllers;

use MyProject\Exceptions\InvalidArgumentException;
use MyProject\Models\Users\User;   // неймспейс для модели User
use MyProject\Models\Users\UserActivationService;   // неймспейс для модели User
use MyProject\Models\Users\UsersAuthService;   // неймспейс для модели User
use MyProject\Services\EmailSender;

use MyProject\View\View;
use MyProject\Exceptions\NotFoundException;
use MyProject\Models\Articles\Article;



class UsersController extends AbstractController
//class UsersController
{

    // !!!!!!!   перенесли в AbstractController
//    /** @var View */
//    private $view;

    // !!!!!!!   перенесли в AbstractController
//    public function __construct()
//    {
//        $this->view = new View(__DIR__ . '/../../../templates');
//    }


    public function signUp()
    {
//        echo 'здесь будет код для регистрации пользователей';
        if (!empty($_POST)) {
            try {
                $user = User::signUp($_POST);
            } catch (InvalidArgumentException $e) {
                $this->view->renderHtml('users/signUp.php', ['error' => $e->getMessage()]);
                return;
            }

            if ($user instanceof User) {
                $code = UserActivationService::createActivationCode($user);

                EmailSender::send($user, 'Активация', 'userActivation.php', [
                    'userId' => $user->getId(),
                    'code' => $code
                ]);

                $this->view->renderHtml('users/signUpSuccessful.php');
                return;
            }
        }

        $this->view->renderHtml('users/signUp.php');
    }


    public function activate(int $userId, string $activationCode): void
    {
        try {
            $user = User::getById($userId);

            if($user === null) {
                throw new InvalidArgumentException('Пользователь не найден');
            }

//            if($user ->isConfirmed())  {
            if($user ->isConfirmed = false)  {
                throw new InvalidArgumentException('Пользователь уже активирован');
            }


            $isCodeValid = UserActivationService::checkActivationCode($user, $activationCode);
//            var_dump($isCodeValid);

            if (!$isCodeValid) {
                throw new InvalidArgumentException('Неверный код активации');
            }


            if ($isCodeValid) {
                $user->activate();

                echo 'Ваш аккаунт успешно активирован!';
                echo '<br>';
                echo $userId;

                $this->view->renderHtml('users/successfulActivation.php');

                UserActivationService::deleteActivationCode($user, $activationCode);
//                UserActivationService::deleteActivationCode($user);
                return;
            }
        } catch (InvalidArgumentException $e) {
            $this->view->renderHtml('users/nonexistentCode.php', ['error' => $e->getMessage()] );

        }

    }


    public function login()
    {
        if (!empty($_POST)) {
            try {
                $user = User::login($_POST);
                var_dump($user);

//                специальный сервис, который будет работать с пользовательскими сессиями через Cookie.
//                создания нужной Cookie в контроллере
                UsersAuthService::createToken($user);
//                header('Location: /');
                header('Location: /www/');
                exit();
            } catch (InvalidArgumentException $e) {
                $this->view->renderHtml('users/login.php', ['error' => $e->getMessage()]);
                return;
            }
        }

        $this->view->renderHtml('users/login.php');
    }




}