<?php
session_start();

if(!isset($_SESSION['login_user2'])){
header("location: customerlogin.php");
}

?>

<html>

  <head>
    <title> Menu | UniBuku  </title>
    <link rel="shortcut icon" href="images/LogoImages.png">
  </head>

  <link rel="stylesheet" type = "text/css" href ="css/booklist.css">
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
              <li> <a href="managersignup.php"> Admin Sign-up</a></li>
              <li> <a href="#"> Admin Sign-up</a></li>
            </ul>
            </li>

            <li><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-log-in"></span> Login <span class="caret"></span></a>
              <ul class="dropdown-menu">
              <li> <a href="customerlogin.php"> User Login</a></li>
              <li> <a href="managerlogin.php"> Admin Login</a></li>
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

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">

      <div class="item active">
      <img src="images/1.jpg" style="width:100%;">
      <div class="carousel-caption">
      </div>
      </div>

      <div class="item">
      <img src="images/2.jpg" style="width:100%;">
      <div class="carousel-caption">

      </div>
      </div>
      <div class="item">
      <img src="images/3.jpg" style="width:100%;">
      <div class="carousel-caption">
      </div>
      </div>

    </div>
   <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
    </div>

<div class="jumbotron">
  <div class="container text-center">
  <marquee behavior="scroll" direction="left" scrollamount="12"><h1><h1>We help you find your desired book. Get all your book here for great deals! </h1></marquee>

    
  </div>
</div>


<div class="container" style="width:95%;">
<br><br>
<!-- Display all book -->
<?php
require 'connection.php';

$sql = "SELECT * FROM products  ORDER BY product_id";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0){

  while($row = mysqli_fetch_assoc($result)){
    $product_id    = $row['product_id'];
    $product_title   = $row['product_title'];
    $product_desc = $row['product_desc'];
    $product_price = $row['product_price'];
    $quantity = $row['quantity'];
    $available = $row['available'];
    $pro_image = $row['product_image'];

    echo "                    
    <div class='col-md-4'>

    <form method='post' action='cart.php?action=add&id=$product_id'>
    <div class='mypanel' align='center';>
    <div><a href='product.php?p=$product_id'><img src='product_images/$pro_image' style='max-height: 170px;' alt=''></a></div>
    <br>
    <h4 class='text-danger'><strong><?$available></strong></h4>
    <h3 class='text-dark'> $product_title</h3>
    <h5 class='text-info'>$product_desc</h5>
    <h5 class='text-danger'>RM $product_price </h5>
    <h5 class='text-info'>Available: $quantity </h5>
    <h5 class='text-info'>Quantity: <input type='number' min='1' max='1' name='quantity' class='form-control' value='1' style='width: 60px;'></h5>
    <input type='hidden' name='hidden_name' value=$product_title>
    <input type='hidden' name='hidden_price' value=$product_price>
    <input type='submit' name='add' style='margin-top:5px;background-color:#FF7748; color:white' class='btn' value='Add to Cart'>
    </div>
    </form>
    </div>
    
    ";
    }
        ;
      
    }
    ?> 
</div>

<?php
include 'footer.php'
?>