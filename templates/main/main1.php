<?php include __DIR__ . '/../header.php'; ?>

<?php foreach ($articles as $article): ?>
    <h2><a href="/www/articles/<?= $article['id'] ?>"> <?= $article['name'] ?></a></h2>
    <!-- <h2><?= $article['name'] ?></h2> -->
    <p><?= $article['text'] ?></p>
    <p>Имя автора: <?= $article['nickname'] ?></p>
    <hr>
<?php endforeach; ?>
<!-- <h2>Статья 1</h2>
<p>Всем привет, это текст первой статьи</p>
<hr>

<h2>Статья 2</h2>
<p>Всем привет, это текст второй статьи</p> -->

<?php include __DIR__ . '/../footer.php'; ?>
