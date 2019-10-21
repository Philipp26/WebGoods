<?php
$config = include 'config.php';

try {
    $conn = new PDO("sqlsrv:server={$config['serverName']};Database={$config['dbName']}");	
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Error connecting to SQL Server".$e->getMessage());

}


$id = "B37AE81F-B802-A27F-AD08ACA61E0F";
$query = 'select top 10 * from isfrontoffice.dbo.inspolicy where id = '.$id;
$stmt = $conn->query($query);
$result = $stmt->fetch(PDO::FETCH_ASSOC);
    print_r($result);


if( sqlsrv_query( $conn, $query)) {
    die( print_r( sqlsrv_errors(), true) );
}


//Instructions.value("(/Policy/PolicyInfo/Id)[1]", "varchar(50)")
// where id = 'B37AE81F-B802-4D25-A27F-AD08ACA61E0F'

var_dump($stmt);

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




