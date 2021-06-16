<?php

include "config.php";


if(! isset($_POST['blogid']));
    header('Location: index.php');


$bid = $_POST['blogid'];
$temp = $mysqli -> query("DELETE FROM blogs WHERE bid=$bid LIMIT 1");

if(! $temp){
    echo "Blog deletion failed, error info: ". $mysqli -> error;
    echo '</br></br><a href="index.php">Main Menu</a>';
    exit();
}

header('Location: index.php');

?>