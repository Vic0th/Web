<!DOCTYPE html>
<html>
    
<head>

<?php

include "config.php";

if($theuser)
    header('Location: index.php');

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

</head>

<body class="text-center">



<div class="form-signin">


<form class="form-signin" action="2login.php" method="POST">
    <h1 class="h3 mb-3 font-weight-normal">Please Login:</h1>
    <label for="inputEmail" class="sr-only">User Name</label>
    <input type="text" id="inputEmail" class="form-control" placeholder="Username" name="uname" required>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="upass" required>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
</br>

</form>


<a href="signup.php">
    <button style="position:static; width:30%; left:25%;">Signup</button>
</a>

</div>

</body>


</html>