<?php include __DIR__ . '/../header.php'; ?>

    <h1><?= $article->getName(); ?></h1>
    <p><?= $article->getText(); ?></p>


    <?php if($user !== null && $user->isAdmin()) :  ?>
    <p>
        <a href="/www/articles/<?= $article->getId(); ?>/edit">Редактировать статью</a>
    </p>
    <?php endif; ?>
    <p>Автор: <?= $article->getAuthorId(); ?></p>
<!--    echo $user->nickname;-->





<?php include __DIR__ . '/../footer.php'; ?>