<?php

namespace MyProject\Models\Users;

//специальный сервис, который будет работать с пользовательскими сессиями через Cookie.
//обработкa ситуации, когда логин и пароль верны и метод login в модели User вернул нам пользователя.
class   UsersAuthService
{
    public static function createToken(User $user): void
    {
        $token = $user->getId() . ':' . $user->getAuthToken();
        setcookie('token', $token, 0, '/', '', false, true);
        var_dump($token);
    }

    public static function deleteToken(): void
    {
//        $token = $user->getId() . ':' . $user->getAuthToken();
        setcookie('token', '', time()-3600, '/', '', false, true);
//        var_dump($token);
    }

    public static function getUserByToken(): ?User
    {
        $token = $_COOKIE['token'] ?? '';

        if (empty($token)) {
            return null;
        }

        //        print_r($_COOKIE);
        //        echo $_COOKIE["token"];

        [$userId, $authToken] = explode(':', $token, 2);

        $user = User::getById((int) $userId);

        if ($user === null) {
            return null;
        }

        if ($user->getAuthToken() !== $authToken) {
            return null;
        }

        return $user;
    }
}
