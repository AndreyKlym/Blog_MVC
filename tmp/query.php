<?php // query.php
    require_once 'login.php';

    //   Подключение к серверу MySQL с помощью mysqli
    $conn = new mysqli ($hn, $un, $pw, $db );
    if ($conn->connect_error) die($conn->connect_error);

    // Отправка запроса к базе данных с помощью mysqli
    $query = "SELECT * FROM classics";
    $result = $conn->query($query);
    if (!$result) die ($conn->error);

    // поэлементное извлечения нужных вам данных с помощью имеющегося у этого объекта метода fetch_assoc
    $rows = $result->num_rows;
    for ($j = 0 ; $j < $rows ; ++$j) {
    $result->data_seek($j);    
    echo 'Author: '   . $result->fetch_assoc()['author']   . '<br>';
    $result->data_seek($j);    
    echo 'Title: '    . $result->fetch_assoc()['title']    . '<br>';
    $result->data_seek($j);    
    echo 'Category: ' . $result->fetch_assoc()['category'] . '<br>';
    $result->data_seek($j);    
    echo 'Year: '     . $result->fetch_assoc()['year']     . '<br>';
    $result->data_seek($j);    
    echo 'ISBN: '     . $result->fetch_assoc()['isbn']     . '<br><br>';
    }
    $result->close();
    $conn->close();



?>