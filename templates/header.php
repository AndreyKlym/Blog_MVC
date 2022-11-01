<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Мой блог'; ?></title>
    <!-- <title>Мой блог</title> -->
    <link rel = "stylesheet" href="/www/style.css">
    <!-- <link rel = "stylesheet" href="style.css"> -->
    <style> </style>
</head>
<body>

    <table class="layout">
        <tr>
            <td colspan="2" class="header">
                Мой блог
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: right">
                <?php if(!empty($user)) :  ?>
                    Привет, <?=  $user->getNickname() ?> | <a href="/www/users/logout "> Выйти </a>
                <?php else : ?>
                <a href="/www/users/login "> Войдите на сайт </a> | <a href="/www/users/register "> Зарегистрироваться
                    </a>
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <td>
                