<?php
require 'confBDD.php';
if(isset($_POST["mail"]) && isset($_POST["password"])) {
    
}
?>

<h3>Sign Up</h3>
<form>
    <label>Email</label>
    <input name="mail" type="mail" placeholder="email">
    <label>Password</label>
    <input name="password" placeholder="password">
    <input type="submit" value="send">
</form>