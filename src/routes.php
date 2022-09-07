<?php

return [
    '~^hello/(.*)$~' => [\MyProject\Controllers\MainController::class, 'sayHello'],
    '~^bye/(.*)$~' => [\MyProject\Controllers\MainController::class, 'sayBay'],
    '~^contacts/(.*)$~' => [\MyProject\Controllers\MainController::class, 'contacts'],
    '~^about/(.*)$~' => [\MyProject\Controllers\MainController::class, 'about'],

    // Добавим новый роут. 
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

    '~^$~' => [\MyProject\Controllers\MainController::class, 'main'],
];