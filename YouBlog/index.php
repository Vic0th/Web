<!DOCTYPE html>
<html>

<head>

<?php

include "config.php";


if( $theuser == false)
  header('Location: login.php');

else if( $theuser != false && $isAdmin == false )
  header('Location: browse.php');


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
    
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900" rel="stylesheet">
    <link href="blog.css" rel="stylesheet">



</head>


<body>



<hr>
<main role="main" class="container">
  <div class="row">
    <div class="col-md-8 blog-main">
      <h3 class="pb-4 mb-4 font-italic border-bottom">
        Admin Panel
      </h3>
      Welcome back Admin!</br>
      Feel free to edit the whole site.</br></br>
      You cannot write blogs here, you need to log into a normal account to do so.</br>
      You can go to blogs with the links though.</br>
      Choose what you want to do with the buttons on the right.</br>
    </div><!-- /.blog-main -->





    <aside class="col-md-4 blog-sidebar">

      <div class="p-4" style="nav-up: auto;">
        <ol class="list-unstyled mb-0">
          <li><a class="btn btn-outline-primary" style="width: 50%; background-color: #303030; color: white;" href="accountslist.php" onmouseover="this.style.backgroundColor = '#553575';" onmouseout="this.style.backgroundColor = '#303030'">Accounts List</a></li>
          </br>
          <li><a class="btn btn-outline-primary" style="width: 50%; background-color: #303030; color: white;" href="blogslist.php" onmouseover="this.style.backgroundColor = '#553575';" onmouseout="this.style.backgroundColor = '#303030'">Blogs List</a></li>
          </br>
          <li><a class="btn btn-outline-primary" href="logout.php" style="width: 50%; background-color: #a07d1c; color: white;" onmouseover="this.style.backgroundColor = `#e9c561`;" onmouseout="this.style.backgroundColor = `#a07d1c`">Logout</a></li>
        </ol>
      </div>

      <div class="p-4">
        <h4 class="font-italic">Source Code</h4>
        <ol class="list-unstyled">
          <li><a href="https://github.com/Vicoth/Web/tree/main/YouBlog">GitHub</a></li>
        </ol>
      </div>
    </aside><!-- /.blog-sidebar -->

  </div><!-- /.row -->

</main><!-- /.container -->





</body>


</html>
