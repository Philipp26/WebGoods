<?php
$config = include 'config.php';

//Connection to DataBase
try {
    $conn = new PDO("sqlsrv:server={$config['serverName']};Database={$config['dbName']}");	
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Error connecting to SQL Server".$e->getMessage());
}

$STH = $conn->prepare("select top 10 * from isfrontoffice.dbo.inspolicy where [id] = ?");
$id = "F5FD2D34-5D49-4155-9FA2-D8D551CEA4FB";

$STH->bindParam(1, $id);
$STH->execute();
$STH->setFetchMode(PDO::FETCH_OBJ);

$xmlPolicy = null; 

while($row = $STH->fetch()){
	$xmlPolicy = simplexml_load_string($row->policy) or die("Error: Cannot create object");
}

//print_r($xmlPolicy);

echo <<<_END
<html>
<head>
<title>Web-имущество</title>
</head>
<style>
   body { 
    margin: 25; 
   }
   .parent {
    margin: 20%; 
    background: #fd0; 
    padding: 10px;
   } 
   .child {
    border: 3px solid #666; 
    padding: 10px; 
    margin: 10px; 
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




