
    
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
  <h1>Update Book</h1>
</div>
</div>


<?php

include 'connection.php';
$product_id=$_GET['product_id'];
$product_available = array("Ready Stock","Sold Out");

$result=mysqli_query($conn,"SELECT product_id, product_title, product_price , product_desc , quantity , available from products where product_id='$product_id'")or die ("query 1 incorrect.......");

list($product_id,$product_title,$product_price,$product_desc,$quantity,$available)=mysqli_fetch_array($result);

if(isset($_POST['btn_save'])) 
{
$product_id=$_POST['product_id'];
$product_title=$_POST['product_title'];
$product_price=$_POST['product_price'];
$product_desc=$_POST['product_desc'];
$quantity=$_POST['quantity'];
$available=$_POST['available'];

$sql_upd=mysqli_query($conn,"UPDATE products 
              set product_title='$product_title', product_price='$product_price', product_desc='$product_desc', quantity='$quantity' , available='$available' where product_id='$product_id' ")or die("Query 2 is inncorrect..........");
              

  echo "<script language='javascript'>alert('Successfully Updated Book')</script>";
  echo "<meta http-equiv='refresh' content='0; url=managebook.php'>";
mysqli_close($conn);
}
?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">

              <form action="editbook.php" name="form" method="post" enctype="multipart/form-data">
              <div class="card-body">
                
                  <input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id;?>" />
                    <div class="col-md-12 ">
                      <div class="form-group">
                        <label>Book Title</label>
                        <input type="text" id="product_title" name="product_title"  class="form-control" value="<?php echo $product_title; ?>" >
                      </div>
                    </div>
                    <div class="col-md-12 ">
                      <div class="form-group">
                        <label>Book Price (RM)</label>
                        <input type="text" id="product_price" name="product_price" class="form-control" value="<?php echo $product_price; ?>" >
                      </div>
                    </div>
                    <div class="col-md-12 ">
                      <div class="form-group">
                        <label>Book Description</label>
                        <input type="text"  id="product_desc" name="product_desc" class="form-control" value="<?php echo $product_desc; ?>">
                      </div>
                    </div>
                    <div class="col-md-12 ">
                      <div class="form-group">
                        <label >Quantity</label>
                        <input type="text" name="quantity" id="quantity" class="form-control" value="<?php echo $quantity; ?>">
                      </div>
                    </div>
                    <div class="col-md-12 ">
                      <div class="form-group">
                    <label >Book Availability</label>
                    <select name="available" id="available"> 
                            <?php 
                            for($i=0;$i<sizeof($product_available);$i++)
                            {
                                if($available==$product_available[$i])
                                { ?>
                            <option selected="selected" value="<?php echo $product_available[$i]; ?>"> 
                            <?php echo $product_available[$i]; ?>              </option> 
                                <?php 
                                } 
                                else{ ?>
                            <option value="<?php echo $product_available[$i]; ?>"> 
                            <?php echo $product_available[$i]; ?>              </option>
                            <?php 
                                }
                            } ?>
                            </select>
                    </div>
              </div>
              <div class="card-footer">
                <button type="submit" id="btn_save" name="btn_save" class="btn btn-fill btn-primary">Update</button>
              </div>
              <input type="hidden" name="btn_save" value="btn_save" />
                    <input type="hidden" name="product_id" value="<?php echo $product_id; ?>" />
              </form>    
            </div>
          </div> 
        </div>
          </div>