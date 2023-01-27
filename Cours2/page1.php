<?php
require 'menu.php';

$mail = "test.email@gmail.com";
$password = "mdp";

if($_POST["mail"] == $mail && $_POST["password"] == $password ) {
    session_start();
    $_SESSION["connected"] = true;
    $msg = "success";
} else {
    $msg = "error";
}

?>
<h1><?= $msg ?><h1>
