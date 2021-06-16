<!DOCTYPE html>
<html>
    
<head>

<?php

include "config.php";


if($theuser == false)
    header('Location: login.php');

else if($isAdmin)
    header('Location: index.php');
    
  
$done = 0;


if( isset($_POST['uname']) ){
    $done = 2;

    $uname = $_POST['uname'];

    $temp = "UPDATE users SET username='" . $uname ."' WHERE username='" . $_SESSION['username'] . "'";

    $test = $mysqli -> query($temp);

    if($test){
        $_SESSION['username'] = $uname;
        $done = 1;
    }
}

else if( isset($_POST['upass']) && isset($_POST['upassOld']) ){
    $done = 2;

    $upasOld = $_POST['upassOld'];
    $upasOld = hash('sha256', $upasOld);

    $upas = $_POST['upass'];
    $upas = hash('sha256', $upas);
    
    if( $_SESSION['password'] != $upasOld)
    $done = 3;

    else{
        $temp = "UPDATE users SET password='" . $upas ."' WHERE password='" . $_SESSION['password'] . "'";

        $test = $mysqli -> query($temp);
    
        if($test){
            $_SESSION['password'] = $upas;
            $done = 1;
        }
    }
    
}




?>

<link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

.bd-placeholder-img {
    font-size: 1.125rem;
    text-anchor: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

@media (min-width: 768px) {
    .bd-placeholder-img-lg {
    font-size: 3.5rem;
    }
}

</style>


<link href="signin.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900" rel="stylesheet">
<link href="blog.css" rel="stylesheet">

</head>

<body class="text-center">


<div class="form-signin">
</br>

<h1 class="h3 mb-3 font-weight-normal">Change Username:</h1>

<form class="form-signin" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
    <label for="inputEmail" class="sr-only">User Name</label>
    <input type="text" id="inputEmail" class="form-control" value="<?php echo $_SESSION["username"]; ?>" name="uname" required></br>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Change</button></br></br>

</form>


<h1 class="h3 mb-3 font-weight-normal">Change Password:</h1>

<form class="form-signin" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <label for="inputPassword" class="sr-only">Password</label>
    <b>Old Password:</b>
    <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="upassOld" required>
    <b>New Password:</b>
    <input type="password" id="inputPasswordOld" class="form-control" placeholder="Password" name="upass" required>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Change</button>
</form>


<div class="p-4" style="nav-up: auto;">
 <ol class="list-unstyled mb-0">
<li><a class="btn btn-outline-primary" style="width: 50%; background-color: #303030; color: white;" href="index.php" onmouseover="this.style.backgroundColor = '#553575';" onmouseout="this.style.backgroundColor = '#303030'">Main Menu</a></li></br>
<li><a class="btn btn-outline-primary" style="width: 50%; background-color: #930505; color: white;" href="deleteaccount.php" onmouseover="this.style.backgroundColor = '#e02c2c';" onmouseout="this.style.backgroundColor = '#930505'">Delete Account</a></li>
</ol>
</div>




<?php

if($done == 1){
    echo "Account Edited";
}

else if($done == 2){
    echo "Error : '$mysqli -> error'";
}

else if($done == 3){
    echo "Old password isn't correct. Please try again.";
}

?>


</div>




</body>


</html>