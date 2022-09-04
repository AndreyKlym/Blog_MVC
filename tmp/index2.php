<?php
//index.php 
  require_once 'login.php';



  //   Подключение к серверу MySQL с помощью mysqli
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die($conn->connect_error);

  //   Отправка запроса к базе данных с помощью mysqli
  //   запрос на Author, Title, Year с сортировкой

  $query = "SELECT Author, Title, Year FROM classics ORDER BY Year ASC";
  // $query = "SELECT Name, CountryCode FROM City ORDER BY ID DESC";


  $result = $conn->query($query);
  if (!$result) die ($conn-> error);

  // поэлементное извлечения нужных вам данных с помощью имеющегося у этого объекта метода fetch_assoc
  while ($row = $result->fetch_assoc()) {
      printf("Author - %s, (Title - %s),  Year - %s <br>", $row["Author"], $row["Title"], $row["Year"]);
      // printf("%s (%s)\n", $row["Name"], $row["CountryCode"]);

  }
  


  $result->close();
  $conn->close();








?>