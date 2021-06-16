<?php

session_start();

$mysqli = new mysqli("localhost","root","","283961");

if($mysqli -> connect_errno){
    echo "Connection to the database failed.";
    echo '</br></br><a href="index.php">Try Again</a>';
    exit();
}

$theuser = false;
if( isset($_SESSION["username"]) && isset($_SESSION["password"]) ){
    
    $un = $_SESSION["username"];
    $pw = $_SESSION["password"];

    $res = $mysqli -> query("SELECT * FROM users WHERE username='$un' AND password='$pw' LIMIT 1");
    $theuser = $res -> fetch_assoc();
}

$isAdmin = false;
if($theuser != false && $theuser['username'] == "admin" && $theuser["password"] = hash('sha256', "AdminYouBlog16000"))
    $isAdmin = true;

?>