<?php
include('session_r.php');

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
  <script type="text/javascript">
    function display_alert()
    {
      alert("Successful update customer order");
    }
  </script>
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

    <div class="container">
        <div class="jumbotron">
         <h2>Hello Seller !</h2>
         <p>Customer Order List</p>

        </div>
    </div>

<div class="container">
    <div class="container">
    	<div class="col">
    	</div>
  </div>

    	<div class="col-xs-2" style="text-align: center;">

    	<div class="list-group">
        <a href="customerorder.php" class="list-group-item active ">Customer Order</a>
    	</div>
    </div>

    <div class="col-xs-12">
      <div class="form-area">
        <form action="customerorder1.php" method="POST">
        <br style="clear: both">
          <h3 style="margin-bottom: 25px; text-align: center; font-size: 30px;"> ORDERS LIST </h3>

<?php
// Storing Session
$user_check=$_SESSION['login_user3'];
$sql = "SELECT * FROM ORDERS INNER JOIN CUSTOMER ON ORDERS.username = CUSTOMER.username;";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0)
{

  ?>
  <table class="table table-striped">
    <thead class="thead-dark">
      <tr>
        <th> # </th>
        <th> Customer Name </th>
        <th> Address </th>
        <th> Phone No. </th>
        <th> Date </th>
        <th> Item Name </th>
        <th> Price </th>
        <th> Quantity </th>
        <th> Status Order </th>
        <th> Status Payment </th>
      </tr>
    </thead>

    <?PHP
      //OUTPUT DATA OF EACH ROW
      while($row = mysqli_fetch_assoc($result)){
    ?>

  <tbody>
    <tr>
      <td> <input name="checkbox[]" type="checkbox" value="<?php echo $row['order_ID']; ?>"/> </td>
      <td> <?php echo $row["fullname"]; ?></td>
      <td> <?php echo $row["address"]; ?></td>
      <td> <?php echo $row["contact"]; ?></td>
      <td><?php echo $row["order_date"]; ?></td>
      <td><?php echo $row["bookname"]; ?></td>
      <td>RM <?php echo number_format($row["price"] * $row["quantity"], 2); ?></td>
      <td><center>x<?php echo $row["quantity"]; ?></center></td>
      <td><?php echo $row["status"]; ?></td>
      <td><?php echo $row["paymentstatus"]; ?></td>
    </tr>
  </tbody>

  <?php } ?>
  </table>
    <br>
    <div class="form-group">
    <button type="submit" id="submit" name="submit" value="submit" class="btn btn-info pull-right" onclick="display_alert()"> Received</button>
  </div>

  <?php } else { ?>

  <h4><center>0 RESULTS</center> </h4>

<?php } ?>

      </form>


      </div>

  </div>
</div>

</body>
</html>
