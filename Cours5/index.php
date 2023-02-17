<?php
session_start();
require 'confBDD.php';
$_SESSION["connected"] = !isset($_SESSION["connected"]) ? false : (checkUserExists() || $_SESSION["connected"]) ? true : false;

require 'pages/menu.html';

if(isset($_GET['page'])) {
  $page = $_GET["page"];
  require("pages/$page");
} 

if(isset($_POST["signMail"]) && isset($_POST["signPassword"])) {
  inscription($_POST["signMail"], $_POST["signPassword"]);
}

if($_SESSION["connected"]) {
  getUsers();  
} else {
  echo "User not connected";
}
