<!DOCTYPE html>
<html>

<head>
<?php

include "config.php";

if($theuser == false){
    header('Location: login.php');
    exit();
}

if( ! isset($_POST['blogid']) ){
    echo "Blog id reading error occurred.</br></br>";
    echo '<a href="index.php">To The Main Menu</a>';
    exit();
}


$bid = $_POST['blogid'];
$blog = $mysqli -> query("SELECT * FROM blogs WHERE bid=" . $bid);
$blog = $blog -> fetch_assoc();

if(! isset($blog)){
    echo "Blog could not be found.</br></br>";
    echo '<a href="index.php">To The Main Menu</a>';
    exit();
}

if( $theuser['id'] != $blog['user_id']){
    echo "Only the author of the blog can edit/update this blog.</br></br>";
    echo '<a href="index.php">To The Main Menu</a>';
    exit();
}

//$cont = str_replace('<br />', "\n", $blog['content']);

if(isset($_POST['blogheader']) && isset($_POST['blogtext'])){

    $bh = $_POST['blogheader'];
    $bt = $_POST['blogtext'];

    $tempa = "UPDATE blogs SET header='" . $bh . "' WHERE bid='" . $blog['bid'] . "' LIMIT 1";
    $tempb = "UPDATE blogs SET content='" . $bt . "' WHERE bid='" . $blog['bid'] . "' LIMIT 1";

    $test1 = $mysqli -> query($tempa);
    $test2 = $mysqli -> query($tempb);

    if($test1 && $test2){
        header("Location: blog.php?id=" . $blog['bid'] );
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
    
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900" rel="stylesheet">
    <link href="blog.css" rel="stylesheet">




</head>


<body>
<hr>



<main role="main" class="container">
  <div class="row">
    <div class="col-md-8 blog-main">
      <h3 class="pb-4 mb-4 font-italic border-bottom">
        Update The Blog
      </h3>


      <div class="blog-post">
        
      </div><!-- /.blog-post -->
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

        <input name="blogid" value="<?php echo $blog['bid']; ?>" style="display:none;"></input>

        <input type="text" class="form-control" placeholder="Header" name="blogheader" value="<?php echo $blog['header']; ?>" required></input></br>
        <textarea type="text" class="form-control" placeholder="Contents of the blog" name="blogtext" id="textcontent" required maxlength="3000" style="height: 500px;" multiple></textarea>
        <script>
        var x = `<?php echo $blog['content']; ?>`;
        document.getElementById("textcontent").value = x;
        </script>

        </br></br>
        <button class="btn btn-outline-primary" style="width: 30%; background-color: #131399; color: white;" type="submit" onmouseover="this.style.backgroundColor = `#4040ce`;" onmouseout="this.style.backgroundColor = `#131399`">Update</button>
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

          <li>
          <form action="deleteblog.php" method="POST">
          <input type="number" name="blogid" value="<?php echo $blog['bid'];?>" style="display:none;"></input>
          <button class="btn btn-outline-primary" type="submit" style="width: 50%; background-color: #930505; color: white;" onmouseover="this.style.backgroundColor = `#e02c2c`;" onmouseout="this.style.backgroundColor = `#930505`">Delete Blog</button>
          </form>
          </li>
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