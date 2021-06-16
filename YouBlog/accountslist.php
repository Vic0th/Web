<!DOCTYPE html>
<html>

<head>

<?php

include "config.php";


if( $theuser == false)
  header('Location: login.php');

else if( $theuser != false && $isAdmin == false )
  header('Location: browse.php');


if( isset($_POST['acID']) ){

    $ac_id = $_POST['acID'];


    $mysqli -> query("DELETE FROM blogs WHERE user_id=$ac_id");

    $mysqli -> query("DELETE FROM users WHERE id=$ac_id");

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





<style type="text/css">
.main-box.no-header {
    padding-top: 20px;
}
.main-box {
    background: #FFFFFF;
    -webkit-box-shadow: 1px 1px 2px 0 #CCCCCC;
    -moz-box-shadow: 1px 1px 2px 0 #CCCCCC;
    -o-box-shadow: 1px 1px 2px 0 #CCCCCC;
    -ms-box-shadow: 1px 1px 2px 0 #CCCCCC;
    box-shadow: 1px 1px 2px 0 #CCCCCC;
    margin-bottom: 16px;
    -webikt-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
}
.table a.table-link.danger {
    color: #e74c3c;
}
.label {
    border-radius: 3px;
    font-size: 0.875em;
    font-weight: 600;
}
.user-list tbody td .user-subhead {
    font-size: 0.875em;
    font-style: italic;
}
.user-list tbody td .user-link {
    display: block;
    font-size: 1.25em;
    padding-top: 3px;
    margin-left: 60px;
}
a {
    color: #3498db;
    outline: none!important;
}
.user-list tbody td>img {
    position: relative;
    max-width: 50px;
    float: left;
    margin-right: 15px;
}

.table thead tr th {
    text-transform: uppercase;
    font-size: 0.875em;
}
.table thead tr th {
    border-bottom: 2px solid #e7ebee;
}
.table tbody tr td:first-child {
    font-size: 1.125em;
    font-weight: 300;
}
.table tbody tr td {
    font-size: 0.875em;
    vertical-align: middle;
    border-top: 1px solid #e7ebee;
    padding: 12px 8px;
}
a:hover{
text-decoration:none;
}
</style>

<script type="text/javascript">

</script>





    
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900" rel="stylesheet">
    <link href="blog.css" rel="stylesheet">



</head>


<body>



<hr>
<main role="main" class="container">
  <div class="row">
    <div class="col-md-8 blog-main">
      <h3 class="pb-4 mb-4 font-italic">
        All Accounts
      </h3>



      <div class="row">
        <div class="col-lg-12">
            <div class="main-box no-header clearfix">
                <div class="main-box-body clearfix">
                    <div class="table-responsive">
                        <table class="table user-list" style="max-width: 80%;">
                            <thead>
                              <tr>
                                <th><span>Username</span></th>
                                <th><span>ID</span></th>
                                <th class="text-center"><span>Password</span></th>
                                <th></th>
                              </tr>
                            </thead>
                            <tbody>


                            <?php

                            $acs = $mysqli -> query("SELECT * FROM users");
                            $rows = $acs -> fetch_all(MYSQLI_ASSOC);


                            $o1 = '<tr>
                            <td>
                            <p>';

                            $o2 = '</p>
                            </td>
                            <td>';

                            $o3 = '</td>
                            <td class="text-center">
                            <span>';

                            $o4 = '</span>
                            </td>
                            <td>
                            <form action="';

                            $o5 = '" method="POST">
                            <input type="number" name="acID" value="';

                            $o6 = '" style="display:none;"></input>
                            <button type="submit" class="btn btn-outline-primary" style="background-color: #930505; color: white;" onmouseover="this.style.backgroundColor = `#e02c2c`;" onmouseout="this.style.backgroundColor = `#930505`">Delete</button>
                            </form>
                            </td>
                            </tr>';
                            
                            for($x = count($rows)-1; $x >= 0; $x--){
                              if($rows[$x]['username'] == "admin")
                                continue;
                              
                              else
                              $str = $o1 . $rows[$x]['username'] . $o2 . $rows[$x]['id'] . $o3 . $rows[$x]['password'] . $o4 . $_SERVER['PHP_SELF'] . $o5 . $rows[$x]['id'] . $o6;
                              echo $str;

                              }
                              

                              ?>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>





    </div><!-- /.blog-main -->





    <aside class="col-md-4 blog-sidebar">

      <div class="p-4" style="nav-up: auto;">
        <ol class="list-unstyled mb-0">
          <li><a class="btn btn-outline-primary" style="width: 50%; background-color: #303030; color: white;" href="index.php" onmouseover="this.style.backgroundColor = '#553575';" onmouseout="this.style.backgroundColor = '#303030'">Main Menu</a></li>
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