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

  <link rel="stylesheet" type = "text/css" href ="css/payment.css">
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


<div class="jumbotron">
  <div class="container text-center">
    <h1>Your Order Status</h1>
          <center><img src="images/trolley1.gif" alt="Delivery" style="width:350px;height:200px;"></center>
    
  </div>
</div>

<div class="container" style="width:95%;" >
<?php

// Storing Session
$user_check=$_SESSION['login_user2'];
$sql = "SELECT * FROM ORDERS WHERE username = '$user_check' AND paymentstatus = 'UNPAID' ORDER BY status";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0)
{

  ?>

    <table class="table table-hover" >
      <thead class="thead-dark">
        <tr>
          <th>  </th>
          <th> Date </th>
          <th> Book Name </th>
          <th> Price </th>
          <th> Quantity </th>
          <th> Status of Order </th>
        </tr>
      </thead>

      <?PHP
        //OUTPUT DATA OF EACH ROW
        while($row = mysqli_fetch_assoc($result)){
      ?>

    <tbody>
      <tr>
        <td> <span class="glyphicon glyphicon-menu-right"></span> </td>
        <td><?php echo $row["order_date"]; ?></td>
        <td><?php echo $row["bookname"]; ?></td>
        <td>RM <?php echo $row["price"]; ?></td>
        <td><?php echo $row["quantity"]; ?></td>
        <td><?php echo $row["status"]; ?></td>
      </tr>
      </tbody>

  <?php } ?>
  </table>
    <h4><center>Thank you for your order !</center> </h4>
    <br>

  <?php } else { ?>

  <h4><center>Opsss..no order <a href="booklist.php"><strong>Place Order Here!</strong></center> </h4>

<?php } ?>

      </form>


      </div>

  </div>
</div>

</body>
</html>
