<!DOCTYPE html>
<html>

<head>
<?php

include "config.php";

if($theuser == false){
    header('Location: login.php');
    exit();
}

else if($isAdmin){
  header('Location: index.php');
  exit();
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
    
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900" rel="stylesheet">
    <link href="blog.css" rel="stylesheet">




</head>


<body>
<hr>



<main role="main" class="container">
  <div class="row">
    <div class="col-md-8 blog-main">
      <h3 class="pb-4 mb-4 font-italic border-bottom">
        Write a Blog
      </h3>


      <div class="blog-post">
        
      </div><!-- /.blog-post -->
        <form action="2write.php" method="POST">

        <input type="text" class="form-control" placeholder="Header" name="blogheader" required></input></br>
        <textarea type="text" class="form-control" placeholder="Contents of the blog" name="blogtext" required maxlength="3000" style="height: 500px;" multiple></textarea>

        </br></br>
        <button class="btn btn-outline-primary" style="width: 30%; background-color: #131399; color: white;" type="submit" onmouseover="this.style.backgroundColor = `#4040ce`;" onmouseout="this.style.backgroundColor = `#131399`">Post Blog</button>
        <a class="btn btn-outline-primary" style="width: 30%; background-color: #a07d1c; color: white;" href="browse.php" onmouseover="this.style.backgroundColor = `#e9c561`;" onmouseout="this.style.backgroundColor = `#a07d1c`">Cancel</a>

        </form>

        <hr>
    </div><!-- /.blog-main -->


    



<aside class="col-md-4 blog-sidebar">

      <div class="p-4" style="nav-up: auto;">
        <ol class="list-unstyled mb-0">
          <li><a class="btn btn-outline-primary" style="width: 50%; background-color: #303030; color: white;" href="editaccount.php" onmouseover="this.style.backgroundColor = '#553575';" onmouseout="this.style.backgroundColor = '#303030'">Edit Account</a></li>
          </br>
          <li><a class="btn btn-outline-primary" style="width: 50%; background-color: #303030; color: white;" href="blogslist.php" onmouseover="this.style.backgroundColor = '#553575';" onmouseout="this.style.backgroundColor = '#303030'">Edit My Blogs</a></li>
          </br>
          <li><a class="btn btn-outline-primary" style="width: 50%; background-color: #303030; color: white;" href="browse.php" onmouseover="this.style.backgroundColor = '#553575';" onmouseout="this.style.backgroundColor = '#303030'">Browse Blogs</a></li>
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
    </aside>



</body>


</html>