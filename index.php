<?php
$config = include 'config.php';

//Connection to DataBase
try {
    $conn = new PDO("sqlsrv:server={$config['serverName']};Database={$config['dbName']}");	
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Error connecting to SQL Server".$e->getMessage());
}

$namespace = "http://tempuri.org/policy.xsd"; 
$id = "A302B645-9503-4511-9605-0317F21133CB";

$STH = $conn->prepare("select top 10 * from isfrontoffice.dbo.inspolicy where [id] = ?");
$STH->bindParam(1, $id); //bind parameters with PDO Object
$STH->execute();
$STH->setFetchMode(PDO::FETCH_OBJ); //Setup mode to get object

$xmlPolicy = null; 

while($row = $STH->fetch()){
	$xmlPolicy = simplexml_load_string($row->policy) or die("Error: Cannot create object");
}
//print_r($xmlPolicy);

$STH = $conn->prepare(
"select top 10 [policy].value('declare default element namespace ?; 
('/Policy/PolicyInfo/ID)[1]', 'varchar(40)') from isfrontoffice.dbo.inspolicy where [id] = ?");

$STH->bindParam(1, $namespace);
$STH->bindParam(2, $id);
$STH->execute();
$STH->setFetchMode(PDO::FETCH_OBJ); 

$conn = null;

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
?>




