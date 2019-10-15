<?php
$config = include 'config.php';

try {
    $conn = new PDO("sqlsrv:server={$config['serverName']};Database={$config['dbName']}");	
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Error connecting to SQL Server".$e->getMessage());

}

echo <<<_END
<html>
<head>
<title>Web-имущество</title>
</head>
<style>
   body { 
    margin: 25; /* Убираем отступы */
   }
   .parent {
    margin: 20%; /* Отступы вокруг элемента */
    background: #fd0; /* Цвет фона */
    padding: 10px; /* Поля вокруг текста */
   } 
   .child {
    border: 3px solid #666; /* Параметры рамки */
    padding: 10px; /* Поля вокруг текста */
    margin: 10px; /* Отступы вокруг */
   }
  </style>
<body>
<p>
<input type="button" value="Список полей для согласования" class="homebutton" id="btnHome" 
onClick="document.location.href='/ListToAvalableFields.php'" />
</p>
<p>
<input type="button" value="Инструкция по продукту" class="homebutton" id="btnHome" 
onClick="document.location.href='/Instructions.php'" />
</p>
</body>
</html>
_END;

$conn = null;

?>




