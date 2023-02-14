<?php
include('session_r.php');
require 'connection.php';

if(!isset($login_session)){
header('Location: sellerlogin.php'); // Redirecting To Home Page
}

?>
<!DOCTYPE html>
<html>

  <head>
    <title> Seller Dashboard </title>
    <link rel="shortcut icon" href="images/logo.png">
  </head>

  <link rel="stylesheet" type = "text/css" href ="css/mygorcery.css">
  <link rel="stylesheet" type = "text/css" href ="css/bootstrap.min.css">
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>

  <body>


    <button onclick="topFunction()" id="myBtn" title="Go to top">
      <span class="glyphicon glyphicon-chevron-up"></span>
    </button>

    <script type="text/javascript">
      window.onscroll = function()
      {
        scrollFunction()
      };

      function scrollFunction(){
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
          document.getElementById("myBtn").style.display = "block";
        } else {
          document.getElementById("myBtn").style.display = "none";
        }
      }

      function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
      }
    </script>

    <nav class="navbar navbar-inverse navbar-fixed-top navigation-clean-search" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myNavbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">UniBuku</a>
        </div>

        <div class="collapse navbar-collapse " id="myNavbar">
          <ul class="nav navbar-nav">
            <li><a href="sellerindex.php">Home</a></li>
          </ul>

          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $login_session; ?> </a></li>
            <li ><a href="addproduct.php"><span class="glyphicon glyphicon-plus"></span> Add Book  </a></li>
            <li ><a href="managebook.php"><span class="glyphicon glyphicon-pencil"></span> Manage Book  </a></li>
            <li><a href="logout_r.php"><span class="glyphicon glyphicon-log-out"></span> Log Out </a></li>
          </ul>
        </div>

      </div>
    </nav>

<div class="jumbotron">
  <div class="container text-center">
    <h1>Manage Book</h1>
  </div>
</div>


    <?php
   
    include 'connection.php';
    if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='delete')
    {
    $product_id=$_GET['product_id'];
    
    /*this is delete query*/
    mysqli_query($conn,"DELETE from products where product_id='$product_id'")or die("query is incorrect...");
    }
    
    ?>
          <!-- End Navbar -->
          <div class="content">
            <div class="container-fluid">
             <div class="col-md-14">
                  <div class="card-body">
                    <div class="table-responsive ps">
                      <table class="table tablesorter table-hover" id="">
                        <thead class=" text-primary">
                          <tr><th>Book Name</th>
                            <th>Book Price (RM)</th>
                            <th>Book Description</th>
                            <th>Book Quantity</th>
                            <th>Book Availability</th>
                        </tr></thead>
                        <tbody>
                          <?php 
                            $result=mysqli_query($conn,"SELECT product_id, product_title, product_price , product_desc , quantity , available from products")or die ("query 2 incorrect.......");
    
                            while(list($product_id,$product_title,$product_price,$product_desc,$quantity,$available)=mysqli_fetch_array($result))
                            {
                            echo "<tr><td>$product_title</td><td>$product_price</td><td>$product_desc</td><td>$quantity</td><td>$available</td>";
    
                            echo"<td>
                            <a href='editbook.php?product_id=$product_id' title='Update Book' class='btn btn-fill btn-primary' data-original-title='Edit Book'>
                            <class='material-icons'>Update Book</class>
                                  <div class='ripple-container'></div></a>
                            <a href='managebook.php?product_id=$product_id&action=delete'  type='button' rel='tooltip' title='Delete Book' class='btn btn-fill btn-primary' data-original-title='Delete Book'>
                            <class='material-icons'>Delete Book</class>
                                  <div class='ripple-container'></div></a>
                            </td></tr>";
                            }
                            mysqli_close($conn);
                            ?>
                        </tbody>
                      </table>
                    <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
