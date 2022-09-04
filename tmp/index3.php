<?php
//index.php 
  require_once 'login.php';



  //   Подключение к серверу MySQL с помощью mysqli
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die($conn->connect_error);

  //   Отправка запроса к базе данных с помощью mysqli
//   $query = "SELECT * FROM classics WHERE category = 'Fiction' AND year = '1878'";
//   $query = "SELECT author, title, year FROM classics ORDER BY author ASC;";
//   $query = "SELECT author FROM classics";
//   $query = "SELECT DISTINCT author FROM classics";
  $query = "SELECT name,author,title, year FROM customers
  JOIN classics ON customers.isbn=classics.isbn;
 ";
//   $query = "SELECT * FROM classics";
  $result = $conn->query($query);
  if (!$result) die ($conn-> error);

  // поэлементное извлечения нужных вам данных с помощью имеющегося у этого объекта метода fetch_assoc
  $rows = $result->num_rows;
  /* извлечение ассоциативного массива */
  for ($j = 0 ; $j < $rows ; ++$j) {
  $result->data_seek($j);    
  echo 'Author: '   . $result->fetch_assoc()['author']   . '<br>';
  $result->data_seek($j);    
  echo 'Title: '    . $result->fetch_assoc()['title']    . '<br>';
  // $result->data_seek($j);    
  // echo 'Category: ' . $result->fetch_assoc()['category'] . '<br>';
  $result->data_seek($j);    
  echo 'Year: '     . $result->fetch_assoc()['year']     . '<br><br>';
//   echo 'Year: '     . $result->fetch_assoc()['year']     . '<br>';
//   $result->data_seek($j);    
//   echo 'ISBN: '     . $result->fetch_assoc()['isbn']     . '<br><br>';
  }
  $result->close();
  $conn->close();








?>