<?php
$serverName = 'F\SQLEXPRESS';
$dbName = 'AdventureWorksDW2012';

try {
    $conn = new PDO("sqlsrv:server=$serverName;Database=$dbName");	
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Error connecting to SQL Server".$e->getMessage());

}
if (isset($_POST['name'])) $name = $_POST['name'];
else $name = "(Не введено)";
echo <<<_END
<html>
<head>
<title>Form Test</title>
</head>
<body>
Вас зовут: $name<br>
<form method="post" action="index.php">
Как Вас зовут?
<input type="text" name="name">
<input type="submit">
</form>
</body>
</html>
_END;

$conn = null;

?>




