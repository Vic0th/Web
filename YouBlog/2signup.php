<?php

include "config.php";


$_username = $_POST['uname'];
$_password = $_POST['upass'];

$_password = hash('sha256', $_password);

$check = $mysqli -> query("INSERT INTO users (username,password) VALUES ('$_username','$_password')");

if(! $check){
    echo "Signup failed, error info: ". $mysqli -> error;
    echo '</br></br><a href="signup.php">Signup Again</a>';
    exit();
}
else{
    echo "Signup successful.";
    echo '</br></br><a href="login.php">To Login</a>';
    exit();
}

?>