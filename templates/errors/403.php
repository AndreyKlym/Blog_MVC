<?php include __DIR__ . '/../header.php'; ?>

<?php if(!empty($error)): ?>
    <div style="color: red"><?= $error ?></div>
<?php endif; ?>
<p>
    Только пользователь с правами admin может добавлять статьи
</p>


<?php include __DIR__ . '/../footer.php'; ?>
