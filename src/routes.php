<?php

return [
    '~^hello/(.*)$~' => [\MyProject\Controllers\MainController::class, 'sayHello'],
    '~^bye/(.*)$~' => [\MyProject\Controllers\MainController::class, 'sayBay'],
    '~^contacts/(.*)$~' => [\MyProject\Controllers\MainController::class, 'contacts'],
    '~^about/(.*)$~' => [\MyProject\Controllers\MainController::class, 'about'],

    // Пусть наши статьи будут открываться по адресу типа: 
    // http://myproject.loc/articles/1, где вместо 1 может быть любой другой id статьи.
    '~^articles/(\d+)$~' => [\MyProject\Controllers\ArticlesController::class, 'view'],

    // отдельный роут для изменения статей
    '~^articles/(\d+)/edit$~' => [\MyProject\Controllers\ArticlesController::class, 'edit'],

    // отдельный роут для удаления статей
    '~^articles/(\d+)/delete$~' => [\MyProject\Controllers\ArticlesController::class, 'delete'],

    // отдельный роут для вставки статей
    '~^articles/create$~' => [\MyProject\Controllers\ArticlesController::class, 'create'],
    // '~^articles/add$~' => [\MyProject\Controllers\ArticlesController::class, 'add'],
    '~^articles/add$~' => [\MyProject\Controllers\ArticlesController::class, 'add'],

    // отдельный роут для регистрации нового пользователя
    '~^users/register$~' => [\MyProject\Controllers\UsersController::class, 'signUp'],

    // отдельный роут для активации нового пользователя
    '~^users/(\d+)/activate/(.+)$~' => [\MyProject\Controllers\UsersController::class, 'activate'],

    // отдельный роут для авторизации пользователя
    '~^users/login$~' => [\MyProject\Controllers\UsersController::class, 'login'],

    // отдельный роут для разлогинивания пользователя
    '~^users/logout$~' => [\MyProject\Controllers\UsersController::class, 'logout'],

    '~^$~' => [\MyProject\Controllers\MainController::class, 'main'],
];