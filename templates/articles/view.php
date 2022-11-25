<?php include __DIR__ . '/../header.php'; ?>

    <h1><?= $article->getName(); ?></h1>
<!--    <p>--><?//= $article->getText(); ?><!--</p>-->
    <p><?= $article->getParsedText(); ?></p>


    <?php if($user !== null && $user->isAdmin()) :  ?>
    <p>
        <a href="/www/articles/<?= $article->getId(); ?>/edit">Редактировать статью</a>
    </p>
    <?php endif; ?>
<!--    <p>Автор: --><?//= $article->getAuthorId(); ?><!--</p>-->
    <p>Автор: <?= $article->getAuthor()->getNickname(); ?></p>
<!--    echo $user->nickname;-->





<?php include __DIR__ . '/../footer.php'; ?>