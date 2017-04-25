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
		echo "Exo 1:" . "</br>";
		foreach ($dbh->query('SELECT*from clients') as $row) {
			echo $row ['lastName']." ". $row ['firstName']."</br>";
		}
		echo "Exo 2:" . "</br>";
		foreach ($dbh->query('SELECT*from shows') as $row) {
			echo $row ['title']." ". $row ['performer']." ".$row['date']. "</br>";
		}
		echo "Exo 3:" . "</br>";
		foreach ($dbh->query('SELECT*from clients LIMIT 0,20') as $row) {
			echo $row ['lastName']." ". $row ['firstName']."</br>";
		}
		echo "Exo 4:" . "</br>";
		foreach ($dbh->query('SELECT * FROM clients JOIN cards ON clients.cardNumber = cards.cardNumber WHERE cardTypesId = 1;') as $row) {
			echo $row ['id'] ." ". $row ['firstName'] ." ". $row ['lastName']."</br>" ;
		}
		echo "Exo 5:" . "</br>";
		foreach ($dbh->query('SELECT*FROM clients WHERE lastName LIKE "M%" ORDER BY lastName ASC;') as $row) {
			echo "Nom: " . $row['lastName']." "."Prenom :".$row['firstName']."</br>";
		}
		echo "Exo 6:" . "</br>";
		foreach ($dbh->query('SELECT title, performer, date, startTime FROM shows order by title
			ASC') as $row) {
			echo $row ['title'] ." ". $row ['performer'] ." ". $row ['date'] ." ". $row ['startTime']."</br>" ;
	}
	echo "Exo 7:" . "</br>";
	foreach ($dbh->query('SELECT * FROM clients LEFT OUTER JOIN cards ON clients.cardNumber = cards.cardNumber ') as $row){
		echo "Nom : ".$row['lastName']."<br/>"."Prénom : ".$row['firstName']."<br/>"."Date de naissance :".$row['birthDate']."<br/>";
		if($row['card']){
			echo 'Numéro de carte : '.$row['cardNumber']."<br/><br/>";
		}else{
			echo "Pas de carte de fidélité"."<br/><br/>";
		}
	}
// $dbh = null;
} catch (PDOException $e){
	print "Erreur" . $e->getMessage() . "<br/>";
	die();
}
?>


</body>
</html>