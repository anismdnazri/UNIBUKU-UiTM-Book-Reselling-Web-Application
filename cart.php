<?php
session_start();
require 'connection.php';

if(!isset($_SESSION['login_user2'])){
header("location: customerlogin.php");
}
?>

<html>

  <head>
    <title> Cart | UniBuku </title>
    <link rel="shortcut icon" href="images/logo.png">
  </head>

  <link rel="stylesheet" type = "text/css" href ="css/cart.css">
  <link rel="stylesheet" type = "text/css" href ="css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
          <a class="navbar-brand" href="#">UniBuku </a>
        </div>

        <div class="collapse navbar-collapse " id="myNavbar">
          <ul class="nav navbar-nav">
            <li><a href="bookhome.php">Home</a></li>
          </ul>

<?php
if(isset($_SESSION['login_user1'])){

?>


          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $_SESSION['login_user1']; ?> </a></li>
            <li><a href="#">Admin CONTROL PANEL</a></li>
            <li><a href="logout_m.php"><span class="glyphicon glyphicon-log-out"></span> Log Out </a></li>
          </ul>
<?php
}
else if (isset($_SESSION['login_user2'])) {
  ?>
           <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-user"></span> Username: <?php echo $_SESSION['login_user2']; ?> </a></li>
            <li ><a href="booklist.php"><span class="glyphicon glyphicon-th-list"></span> Book Zone </a></li>
            <li ><a href="searchbook.php"><span class="glyphicon glyphicon-search"></span> Search Book </a></li>
            <li><a href="orderstatus.php"><span class="glyphicon glyphicon-book"></span> Order Status </a></li>
            <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart  (<?php
              if(isset($_SESSION["cart"])){
              $count = count($_SESSION["cart"]);
              echo "$count";
            }
              else
                echo "0";
              ?>) </a></li>
              <li><a href="logout_u.php"><span class="glyphicon glyphicon-log-out"></span> Log Out </a></li>
          </ul>
  <?php
}
else {

  ?>

<ul class="nav navbar-nav navbar-right">
            <li><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Sign Up <span class="caret"></span> </a>
                <ul class="dropdown-menu">
              <li> <a href="customersignup.php"> User Sign-up</a></li>
              <li> <a href="managersignup.php"> Manager Sign-up</a></li>
              <li> <a href="#"> Admin Sign-up</a></li>
            </ul>
            </li>

            <li><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-log-in"></span> Login <span class="caret"></span></a>
              <ul class="dropdown-menu">
              <li> <a href="customerlogin.php"> User Login</a></li>
              <li> <a href="managerlogin.php"> Manager Login</a></li>
              <li> <a href="#"> Admin Login</a></li>
            </ul>
            </li>
          </ul>

<?php
}
?>


        </div>

      </div>
    </nav>


<?php
if(!empty($_SESSION["cart"]))
{
  ?>
  <div class="container">
      <div class="jumbotron">
        <h1 align="center">Your Book Cart</h1>
      </div>

    </div>
    <div class="table-responsive" style="padding-left: 100px; padding-right: 100px;" >
<table class="table table-striped">
  <thead class="thead-dark">
<tr>
<th width="40%">Book Name</th>
<th width="10%">Quantity</th>
<th width="20%">Price Details</th>
<th width="15%">Total</th>
</tr>
</thead>


<?php
    if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='delete')
    {
    $product_id=$_GET['product_id'];
    
    /*this is delete query*/
    mysqli_query($conn,"DELETE from products where product_id='$product_id'")or die("query is incorrect...");
    }
$total = 0;
foreach($_SESSION["cart"] as $keys => $values)
{
?>
<tr>
<td><?php echo $values["product_title"]; ?></td>
<td><?php echo $values["quantity"] ?></td>
<td>RM <?php echo $values["product_price"]; ?></td>
<td>RM <?php echo number_format($values["quantity"] * $values["product_price"], 2); ?></td>
<td><a href="cart.php?action=empty"><button class="btn btn-danger">Delete Book</button></td>
<?php
$total = $total + ($values["quantity"] * $values["product_price"]);
}
?>
<tr>
<td colspan="4" align="right">Total</td>
<td align="right">RM <?php echo number_format($total, 2); ?></td>
<td></td>
</tr>
</table>
<?php
 echo '<a href="cart.php?action=empty"><button class="btn btn-danger">Empty Cart</button></a>&nbsp;<a href="booklist.php"><button class="btn btn-warning">Continue Ordering</button></a>&nbsp;<a href="payment.php"><button class="btn btn-success pull-right">Submit Order</button></a>';
?>
</div>
<br><br><br><br><br><br><br>
<?php
}
if(empty($_SESSION["cart"]))
{
  ?>
  <div class="container">
      <div class="jumbotron">
      <h1 align="center">Your Cart</h1>
        <p align="center">Successfully Added to Shopping Cart<a href="booklist.php"> Submit another order?</a></p>
        

      </div>

    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <?php
}
?>


<?php


if(isset($_POST["add"]))
{
if(isset($_SESSION["cart"]))
{
$item_array_id = array_column($_SESSION["cart"], "product_id");
if(!in_array($_GET["product_id"], $item_array_id))
{
$count = count($_SESSION["cart"]);

$item_array = array(
'product_id' => $_GET["product_id"],
'product_title' => $_POST["hidden_name"],
'product_price' => $_POST["hidden_price"],
'quantity' => $_POST["quantity"]
);
$_SESSION["cart"][$count] = $item_array;
echo '<script>window.location="cart.php"</script>';
}
else
{
echo '<script>alert("Book added to cart")</script>';
echo '<script>window.location="cart.php"</script>';
}
}
else
{
$item_array = array(

'product_title' => $_POST["hidden_name"],
'product_price' => $_POST["hidden_price"],
'quantity' => $_POST["quantity"]
);
$_SESSION["cart"][0] = $item_array;
}
}
if(isset($_GET["action"]))
{
if($_GET["action"] == "delete")
{
foreach($_SESSION["cart"] as $keys => $values)
{
if($values["product_id"] == $_GET["product_id"])
{
unset($_SESSION["cart"][$keys]);
echo '<script>alert("Book has been removed")</script>';
echo '<script>window.location="cart.php"</script>';
}
}
}
}

if(isset($_GET["action"]))
{
if($_GET["action"] == "empty")
{
foreach($_SESSION["cart"] as $keys => $values)
{

unset($_SESSION["cart"]);
echo '<script>alert("Cart is empty!")</script>';
echo '<script>window.location="cart.php"</script>';

}
}
}


?>
<?php

?>

    </body>
</html>
