<?php

namespace MyProject\Models\Users;

use MyProject\Models\ActiveRecordEntity;
use MyProject\Models\Users\UsersAuthService;
use MyProject\Exceptions\InvalidArgumentException;

class User extends ActiveRecordEntity   
// class User
{
    /** @var string */
    protected $nickname;

    /** @var string */
    protected $email;

    /** @var int */
    protected $isConfirmed;

    /** @var string */
    protected $role;

    /** @var string */
    protected $passwordHash;

    /** @var string */
    protected $authToken;

    /** @var string */
    protected $createdAt;

    /**
     * @return string
     */
    public function getNickname(): string
    {
        return $this->nickname;
    }

    protected static function getTableName(): string
    {
        return 'users';
    }

     public function getEmail(): string
     {
         return $this->email;
     }

    /**
     * @return string
     */
    public function getAuthToken(): string
    {
        return $this->authToken;
    }

//создадим в модели пользователя статический метод, который будет принимать на вход массив с данными, пришедшими от пользователя, и будет пытаться создать нового пользователя и сохранить его в базе данных.
//    public static function signUp(array $userData)
    public static function signUp(array $userData): User
    {
//        var_dump($userData);

        if (empty($userData['nickname'])) {
            throw new InvalidArgumentException('Не передан nickname');
        }

        if (!preg_match('/^[a-zA-Z0-9]+$/', $userData['nickname'])) {
            throw new InvalidArgumentException('Nickname может состоять только из символов латинского алфавита и цифр');
        }

        if (empty($userData['email'])) {
            throw new InvalidArgumentException('Не передан email');
        }

        if (!filter_var($userData['email'], FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException('Email некорректен');
        }

        if (empty($userData['password'])) {
            throw new InvalidArgumentException('Не передан password');
        }

        if (mb_strlen($userData['password']) < 4) {
            throw new InvalidArgumentException('Пароль должен быть не менее 4 символов');
        }



        if (static::findOneByColumn('nickname', $userData['nickname']) !== null) {
            throw new InvalidArgumentException('Пользователь с таким nickname уже существует');
        }

        if (static::findOneByColumn('email', $userData['email']) !== null) {
            throw new InvalidArgumentException('Пользователь с таким email уже существует');
        }

        //когда все проверки пройдены создаем нового пользователя и сохранить его в базе данных.
        $user = new User();
        $user->nickname = $userData['nickname'];
        $user->email = $userData['email'];
        $user->passwordHash = password_hash($userData['password'], PASSWORD_DEFAULT);
        $user->isConfirmed = false;
        $user->role = 'user';
        $user->authToken = sha1(random_bytes(100)) . sha1(random_bytes(100));
        $user->save();
        //        В конце метода мы сохраняем этого нового пользователя в базу и возвращаем его из метода
        return $user;

    }

    //    активация пользователя
    public function activate(): void
    {
        $this->isConfirmed = true;
        $this->save();
    }

    //    проверка пользователя на admin
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    //    авторизация пользователя
    public static function login(array $loginData): User
    {
            //        var_dump($userDataU);

        if (empty($loginData['email'])) {
            throw new InvalidArgumentException('Не передан email');
        }
        if (empty($loginData['password'])) {
            throw new InvalidArgumentException('Не передан password');
        }

        $user = User::findOneByColumn('email', $loginData['email']);
        if($user === null) {
            throw new InvalidArgumentException('Пользователь с таким email не найден');
        }

        if (!password_verify($loginData['password'], $user->getPasswordHash())) {
            throw new InvalidArgumentException('Неправильный пароль');
        }

        if (!$user->isConfirmed) {
            throw new InvalidArgumentException('Пользователь не подтвержден');
        }

        $user->refreshAuthToken();
        $user->save();

        return $user;
    }

    public function getPasswordHash(): string
    {
        return $this->passwordHash;
    }

    public function refreshAuthToken()
    {
        $this->authToken = sha1(random_bytes(100)) . sha1(random_bytes(100));
    }
    //при успешном входе auth token пользователя в базе обновляется – все его предыдущие сессии станут недействительными.



}