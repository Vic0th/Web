<?php

include "config.php";


$_username = $_POST['uname'];
$_password = $_POST['upass'];

$_password = hash('sha256', $_password);

$res = $mysqli -> query("SELECT * FROM users WHERE username='$_username' AND password='$_password' LIMIT 1");

$row_count = $res -> num_rows;

if($row_count < 1){
    echo "User not found, please try again.";
    echo '</br></br><a href="login.php">Login Again</a>';
    exit();
}


$row = $res -> fetch_assoc();

$_SESSION['username'] = $_username;
$_SESSION['password'] = $_password;

header('Location: index.php');

?>