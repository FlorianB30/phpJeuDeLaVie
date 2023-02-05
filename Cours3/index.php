<?php
require 'confBDD.php';
dbConnect();
session_start();
$_SESSION["connected"] = (isset($_POST["mail"]) && isset($_POST["password"])) ? checkUserExists($_POST["mail"]) : false;
?>

<h2>index</h2>
<p>mail : nom.prenom@gmail.com</p>
<p>password : 1234</p>
<a href="signout.php">sign out</a>
<a href="signup.php"></a>

<?php
    if($_SESSION["connected"]) {
      getUsers();  
    } else {
        require 'login.html';
    }
?>