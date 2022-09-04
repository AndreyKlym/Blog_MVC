<?php include __DIR__ . '/../header.php'; ?>
<h1><?= $article->getName() ?></h1>
<!-- <h1><?= $article['name'] ?></h1> -->
<p><?= $article->getText() ?></p>
<!-- <p><?= $article['text'] ?></p> -->
<p>Имя автора: <?= $article['nickname'] ?></p>
<?php include __DIR__ . '/../footer.php'; ?>