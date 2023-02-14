<?php
session_start();

if(!isset($_SESSION['login_user2'])){
header("location: customerlogin.php");
}

?>


<html>

  <head>
    <title> Menu | UniBuku  </title>
    <link rel="shortcut icon" href="images/logo.png">
  </head>

  <link rel="stylesheet" type = "text/css" href ="css/booklist.css">
  <link rel="stylesheet" type = "text/css" href ="css/bootstrap.min.css">
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>

<div class="container" style="width:95%;">

<?php

require 'connection.php';


if($_GET)
{
  $cari=$_GET['tajuk'];
  $sql_search="SELECT * FROM products
 	   		   WHERE product_title LIKE '%$cari%' 
	  		   ORDER BY product_title"; //LIMIT 0, 15 
  $result = mysqli_query ($conn,$sql_search);
	 


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
<h4 class="text-danger"><strong><?php echo $row["available"]; ?></strong></h4>
<h3 class="text-dark"><?php echo $row["product_title"]; ?></h3>
<h5 class="text-info"><?php echo $row["product_desc"]; ?></h5>
<h5 class="text-danger">RM <?php echo $row["product_price"]; ?> </h5>
<h5 class="text-info">Available: <?php echo $row["quantity"]; ?> </h5>
<h5 class="text-info">Quantity: <input type="number" min="1" max="1" name="quantity" class="form-control" value="0" style="width: 60px;"> </h5>
<input type="hidden" name="hidden_name" value="<?php echo $row["product_title"]; ?>">
<input type="hidden" name="hidden_price" value="<?php echo $row["product_price"]; ?>">
<input type="submit" name="add" style="margin-top:5px;background-color:#FF7748; color:white" class="btn" value="Add to Cart">
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
         <label style="margin-left: 5px;color: red;"> <h2>Oops! The Book is not available.</h2> </label>
      </center>

    </div>
  </div>

  <?php

}

?>
<?php 
}  //end if $_GET
?>

</body>
</html>
