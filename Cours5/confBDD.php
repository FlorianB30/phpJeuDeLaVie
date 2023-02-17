<?php
define ("DB_URL", "mysql:host=localhost;dbname=cours3"); 
define ("DB_USER", "root"); 
define ("DB_PASS", "");

dbConnect();

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

function checkUserExists() {
	$mail = isset($_POST["mail"]) ? $_POST["mail"] : "";
	$password = isset($_POST["mail"]) ? $_POST["password"] : "";
	define ("SQL_USER", "SELECT * FROM user WHERE `mail`= ? ");
	global $pdo;
	$query = $pdo->prepare(SQL_USER);
	$query->execute([$mail]);
	$data = $query->fetchAll(PDO::FETCH_ASSOC);
	//var_dump ($data); 
	foreach($data as $user) {
		return password_verify($password, $user["password"]) ? true : false;
	}
}

function inscription($mail, $password) {
	if(!checkUserInscrit($mail)) {
		define ("SQL_INSC", "INSERT INTO user(`mail`,`password`) VALUES(?,?)");
		global $pdo;
		$query = $pdo->prepare(SQL_INSC);
		$query->execute([$mail, password_hash($password, PASSWORD_DEFAULT)]);
	} else {
		echo "another user use this mail";
	}
}

function checkUserInscrit($mail) {
	define ("SQL_INSCRIT", "SELECT count(*) FROM user WHERE `mail` = ?");
	global $pdo;
	$query = $pdo->prepare(SQL_INSCRIT);
	$query->execute([$mail]);
	$data = $query->fetchAll(PDO::FETCH_ASSOC);
	//var_dump ($data); 
	return $data[0]["count(*)"] == 0 ? false : true;
}
?>