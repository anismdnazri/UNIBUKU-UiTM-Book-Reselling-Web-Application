
<html>

  <head>
    <title> Menu | UniBuku  </title>
    <link rel="shortcut icon" href="images/logo.png">
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
          <a class="navbar-brand">UniBuku </a>
        </div>

        <div class="collapse navbar-collapse " id="myNavbar">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li>
          </ul>

            <ul class="nav navbar-nav navbar-right">

              <li> <a href="booklist.php"> Login / Register</a></li>
            </li>
          </ul>

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
    <h1>We help you find your desired book</h1>
    <h3 style="color:grey;">Get all your book here!</h3>
    
  </div>
</div>

<div class="container" style="width:95%;">

<?php
require 'connection.php';

$sql = "SELECT * FROM products  ORDER BY product_id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0)
{
  $count=0;

  while($row = mysqli_fetch_assoc($result)){
    $pro_image = $row['product_image'];
    if ($count == 0)
      echo "<div class='row'>";
?>
<div class="col-md-3">

<form method="post" action="cart.php?action=add&id=<?php echo $row["product_id"]; ?>">
<div class="mypanel" align="center";>
<?php echo "<img src='product_images/$pro_image' style='max-height: 170px;' alt=''" ?>
<br>
<h4 class="text-danger"><?php echo $row["available"]; ?></h4>
<h4 class="text-dark"><?php echo $row["product_title"]; ?></h4>
<h5 class="text-info"><?php echo $row["product_desc"]; ?></h5>
<h5 class="text-danger">RM <?php echo $row["product_price"]; ?> </h5>
<h5 class="text-info">Available: <?php echo $row["quantity"]; ?> </h5>
<input type="hidden" name="hidden_name" value="<?php echo $row["product_title"]; ?>">
<input type="hidden" name="hidden_price" value="<?php echo $row["product_price"]; ?>">

</div>
</form>


</div>

<?php
$count++;
if($count==4)
{
  echo "</div>";
  $count=0;
}
}
?>

</div>
</div>
<?php
}
else
{
  ?>

<div class="container">
    <div class="jumbotron">
      <center>
         <label style="margin-left: 5px;color: red;"> <h1>Oops! No item is available.</h1> </label>
        <p>Stay Safe...! :P</p>
      </center>

    </div>
  </div>

  <?php

}

?> 

</body>
</html>
<?php 
    include 'footer.php';
?>