<?php

include "config.php";


if(! $theuser){
    session_destroy();
    header('Location: index.php');
}


$ac_id = $_SESSION['id'];

$temp1 = $mysqli -> query("DELETE FROM blogs WHERE user_id=" . $theuser['id']);
if(! $temp1){
    echo "Deleting blogs associated to the target account is failed, error info: ". $mysqli -> error;
    echo '</br></br><a href="index.php">Main Menu</a>';
    exit();
}

$temp2 = $mysqli -> query("DELETE FROM users WHERE id=" . $theuser['id']);
if(! $temp2){
    echo "Account deletion failed, error info: ". $mysqli -> error;
    echo '</br></br><a href="index.php">Main Menu</a>';
    exit();
}

session_destroy();

header('Location: index.php');

?>