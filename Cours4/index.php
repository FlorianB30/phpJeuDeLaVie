<?php
session_start();
require 'confBDD.php';
$_SESSION["connected"] = (isset($_POST["mail"]) && isset($_POST["password"])) ? checkUserExists($_POST["mail"], $_POST["password"]) : false;

require 'pages/menu.html';

if(isset($_GET['page'])) {
  $page = $_GET["page"];
  require("pages/$page");
} 

if($_SESSION["connected"]) {
  getUsers();  
} else {
  echo "User not connected";
}


