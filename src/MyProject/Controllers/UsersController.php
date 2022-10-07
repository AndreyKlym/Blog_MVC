<?php

namespace MyProject\Controllers;

use MyProject\View\View;
use MyProject\Models\Users\User;   // неймспейс для модели User
use MyProject\Models\Users\UserActivationService;   // неймспейс для модели User
use MyProject\Services\EmailSender;

use MyProject\Exceptions\InvalidArgumentException;

use MyProject\Exceptions\NotFoundException;
use MyProject\Models\Articles\Article;



class UsersController
{
    /** @var View */
    private $view;

    public function __construct()
    {
        $this->view = new View(__DIR__ . '/../../../templates');
    }


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
//                throw new ActivationException('Пользователь не найден');
            }

//            if($user ->isConfirmed())  {
            if($user ->isConfirmed = false)  {
                throw new InvalidArgumentException('Пользователь уже активирован');
//                throw new ActivationException('Пользователь уже активирован');
            }


            $isCodeValid = UserActivationService::checkActivationCode($user, $activationCode);
            var_dump($isCodeValid);

            if (!$isCodeValid) {
                throw new InvalidArgumentException('Неверный код активации');
//                throw new ActivationException('Неверный код активации');
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
//        }catch (ActivationException $e) {
            $this->view->renderHtml('users/nonexistentCode.php', ['error' => $e->getMessage()] );



        }

    }


}