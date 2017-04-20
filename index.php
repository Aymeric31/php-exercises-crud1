<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php 

	try{
		$dbh = new PDO('mysql:host=localhost;dbname=colyseum','root','root');
		foreach ($dbh->query('SELECT*from clients') as $row) {
		}
		$dbh = null;
	} catch (PDOException $e){
		print "Erreur" . $e->getMessage() . "<br/>";
		die();
	}
	?>


</body>
</html>