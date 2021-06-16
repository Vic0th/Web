<!DOCTYPE html>
<html>

<head>
<?php

include "config.php";


if($theuser == false)
  header('Location: login.php');


$bid = $_GET['id'];
$blog = $mysqli -> query("SELECT * FROM blogs WHERE bid=" . $bid);
$blog = $blog -> fetch_assoc();

if(! isset($blog)){
    echo "Blog could not be found.</br></br>";
    echo '<a href="index.php">To The Main Menu</a>';
    exit();
}

$isAuthor = false;
if( $theuser['id'] == $blog['user_id'])
  $isAuthor = true;

$blogtext =  nl2br($blog['content']);


$auth = $mysqli -> query("SELECT * FROM users WHERE id=" . $blog['user_id']);
$auth = $auth -> fetch_assoc();

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


    <div class="blog-post">
    <p class="blog-post-title"><?php echo $blog['header'];?></p>
    <p class="blog-post-meta">by <?php echo $auth['username']; ?></p>
    <p><?php echo $blogtext;?></p>
    </div>
    <hr>
    


    </div><!-- /.blog-main -->





    <aside class="col-md-4 blog-sidebar">

      <div class="p-4" style="nav-up: auto;">
        <ol class="list-unstyled mb-0">
          <?php

          $js1 = 'onmouseover="this.style.backgroundColor = ' . "'#553575'" . ';" onmouseout="this.style.backgroundColor = ' . "'#303030'" . '"';

          if(! $isAdmin)
          
          echo '<li><a class="btn btn-outline-primary" style="width: 50%; background-color: #303030; color: white;" href="editaccount.php" ' . $js1 . '>Edit Account</a></li>
          </br>
          <li><a class="btn btn-outline-primary" style="width: 50%; background-color: #303030; color: white;" href="blogslist.php" ' . $js1 . '>Edit My Blogs</a></li>
          </br>
          <li><a class="btn btn-outline-primary" style="width: 50%; background-color: #303030; color: white;" href="browse.php" ' . $js1 . '>Browse Blogs</a></li>
          </br>
          <li><a class="btn btn-outline-primary" style="width: 50%; background-color: #303030; color: white;" href="write.php" ' . $js1 . '>Write Blog</a></li>
          </br>';

          else

          echo '<li><a class="btn btn-outline-primary" style="width: 50%; background-color: #303030; color: white;" href="accountslist.php" ' . $js1 . '>Accounts List</a></li>
          </br>
          <li><a class="btn btn-outline-primary" style="width: 50%; background-color: #303030; color: white;" href="blogslist.php" ' . $js1 . '>Blogs List</a></li>
          </br>';

          if($isAuthor)
          echo '<li>
          <form action="editblog.php" method="POST">
          <input type="number" name="blogid" value="' . $blog['bid'] . '" style="display:none;"></input>
          <button type="submit" class="btn btn-outline-primary" style="width: 50%; background-color: #131399; color: white;" onmouseover="this.style.backgroundColor = `#4040ce`;" onmouseout="this.style.backgroundColor = `#131399`">Update</button>
          </form>
          </li>
          </br>';


          if($isAdmin || $isAuthor)
          echo '<li>
          <form action="deleteblog.php" method="POST">
          <input type="number" name="blogid" value="' . $blog['bid'] . '" style="display:none;"></input>
          <button class="btn btn-outline-primary" type="submit" style="width: 50%; background-color: #930505; color: white;" onmouseover="this.style.backgroundColor = `#e02c2c`;" onmouseout="this.style.backgroundColor = `#930505`">Delete Blog</button>
          </form>
          </li>
          </br>';
          

          ?>
          
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