<?php

return [
    '~^hello/(.*)$~' => [\MyProject\Controllers\MainController::class, 'sayHello'],
    '~^bye/(.*)$~' => [\MyProject\Controllers\MainController::class, 'sayBay'],
    '~^contacts/(.*)$~' => [\MyProject\Controllers\MainController::class, 'contacts'],
    '~^about/(.*)$~' => [\MyProject\Controllers\MainController::class, 'about'],

    // Добавим новый роут. Пусть наши статьи будут открываться по адресу типа: http://myproject.loc/articles/1, где вместо 1 может быть любой другой id статьи.
    '~^articles/(\d+)$~' => [\MyProject\Controllers\ArticlesController::class, 'view'],
    
    '~^$~' => [\MyProject\Controllers\MainController::class, 'main'],
];