<?php
define ("DB_URL", "mysql:host=localhost;dbname=cours3"); 
define ("DB_USER", "root"); 
define ("DB_PASS", "");
?>

<?php
function dbConnect() {
	global $pdo;
	try {
		$pdo = new PDO(DB_URL, DB_USER, DB_PASS);
		$pdo->exec('SET NAMES UTF8');
	}
	catch (PDOException $e) {
		die("<p class='error'>Erreur: " . $e->getMessage() . "</p>");	
	}
}
?>

<?php
//OBTENIR LES USERS
function getUsers() {
	define ("SQL_ALL_USER", "SELECT * FROM user ORDER BY id");
	global $pdo;
	$query = $pdo->prepare(SQL_ALL_USER);
	$query->execute();
	$data = $query->fetchAll(PDO::FETCH_ASSOC);
	//var_dump ($data); 
	foreach ($data as $user) {
        echo "
            {$user["mail"]}
            {$user["password"]}
        ";
	}
}

function checkUserExists($mail) {
	define ("SQL_USER", "SELECT * FROM user ORDER BY id");
	global $pdo;
	$query = $pdo->prepare(SQL_USER);
	$query->execute();
	$data = $query->fetchAll(PDO::FETCH_ASSOC);
	//var_dump ($data); 
	foreach ($data as $user) {
       if($user["mail"] === $mail) {
		return true;
	   }
	}
	echo "user inconnu";
}
?>