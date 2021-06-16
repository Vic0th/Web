<?php

include "config.php";


if( ! $theuser )
    header('Location: login.php');



$blogheader = $_POST['blogheader'];
$blogtext = $_POST["blogtext"];

//$blogtext = nl2br($blogtext);


$check = $mysqli -> query("INSERT INTO blogs (header,content,user_id) VALUES ('$blogheader','$blogtext'," . $theuser['id'] . ")" );

if(! $check){
    echo "Blog creation failed, error info: ". $mysqli -> error;
    echo '</br></br><a href="index.php">Main Menu</a>';
    exit();
}

else
    header('Location: browse.php');

?>