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
		<!-- /BREADCRUMB -->
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},900);
				});
			});
</script>
		<script>
    
    (function (global) {
	if(typeof (global) === "undefined")
	{
		throw new Error("window is undefined");
	}
    var _hash = "!";
    var noBackPlease = function () {
        global.location.href += "#";
		// making sure we have the fruit available for juice....
		// 50 milliseconds for just once do not cost much (^__^)
        global.setTimeout(function () {
            global.location.href += "!";
        }, 50);
    };	
	// Earlier we had setInerval here....
    global.onhashchange = function () {
        if (global.location.hash !== _hash) {
            global.location.hash = _hash;
        }
    };
    global.onload = function () {        
		noBackPlease();
		// disables backspace on page except on input fields and textarea..
		document.body.onkeydown = function (e) {
            var elm = e.target.nodeName.toLowerCase();
            if (e.which === 8 && (elm !== 'input' && elm  !== 'textarea')) {
                e.preventDefault();
            }
            // stopping event bubbling up the DOM tree..
            e.stopPropagation();
        };		
    };
})(window);
</script>
<br><br>
		<!-- SECTION -->
		<div class="section main main-raised">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- Product main img -->
					
					<?php 
								include 'connection.php';
								$product_id = $_GET['p'];

								$sql = "SELECT * FROM products WHERE product_id='$product_id'";
                                
								if (!$conn) {
									die("Connection failed: " . mysqli_connect_error());
								}
								$result = mysqli_query($conn, $sql);
								if (mysqli_num_rows($result) > 0) 
								{
									while($row = mysqli_fetch_assoc($result)) 
									{
									echo '
                  <div class="col-md-5 col-md-push-2">
                    <div id="product-main-img">
                    </div>
                  </div>
                    
                  <div class="col-md-2  col-md-pull-5">
                    <div id="product-imgs">
                        <div class="product-preview">
                            <img src="product_images/'.$row['product_image'].'" width="400px" height="500px" alt="">
                        </div>
                    </div>
                  </div>
                                 
									';
                                    
									?>
									<!-- FlexSlider -->
									
									<?php 
									echo '
									
                                    
                                   
            <div class="col-md-3">
						<div class="product-details">
						<form method="post" action="cart.php?action=add&id=<?php echo $row["product_id"]; ?>
							<h4 class="text-danger">'.$row['available'].'</h4>
							<strong><h2 class="product-name">'.$row['product_title'].'</h2></strong>

							<div>
              <p><h4 class="product-price">'.$row['product_desc'].'</h4></p>
								<h4 class="product-price">RM'.$row['product_price'].'</h4>	
                <h4 class="product-price">Contact: 0'.$row['contact'].'</h4>		
								<h4 class="product-price">Available: '.$row['quantity'].'</h4>
							</div>

							<div class="add-to-cart">
								<div class="qty-label">
								  <h5 class="text-info">Quantity: <input type="number" min="1" max="1" name="quantity" class="form-control" value="1" style="width: 60px;"> </h5>
								</div>
								<div class="btn-group" style="margin-left: 0px; margin-top: 15px">
								  <input type="hidden" name="hidden_name" value='.$row['product_title'].' ?>
								  <input type="hidden" name="hidden_price" value='.$row['product_price'].' ?>
								  <input type="submit" name="add" style="margin-top:5px;background-color:#FF7748; color:white" class="btn" value="Add to Cart">
                </div>
								
							</form>
						</div>
						</div>
					  </div>
         
					<div class="col-md-12">
						<div class="section-title text-center">
							<h1 class="title">Related Products</h1>
							
						</div>
					</div>
                    ';
									$_SESSION['product_id'] = $row['product_id'];
									}
								} 
								?>	
								<?php
                    include 'connection.php';
								$product_id = $_GET['p'];
                    
				        $product_query = "SELECT * FROM products WHERE product_id BETWEEN $product_id AND $product_id+5";
                $run_query = mysqli_query($conn,$product_query);
                if(mysqli_num_rows($run_query) > 0){

                    while($row = mysqli_fetch_array($run_query)){
                        $product_id    = $row['product_id'];
                        $product_title   = $row['product_title'];
                        $product_desc = $row['product_desc'];
                        $product_price = $row['product_price'];
                        $quantity = $row['quantity'];
					            	$available = $row['available'];
                        $contact = $row['contact'];
                        $pro_image = $row['product_image'];

                        echo "
                        
                        <div class='col-md-3'>

                        <form method='post' action='cart.php?action=add&id=$product_id'>
                        <div class='mypanel' align='center';>
                        <div><a href='product.php?p=$product_id'><img src='product_images/$pro_image' style='max-height: 170px;' alt=''></a></div>
                        <br>
                        <h4 class='text-danger'><strong><?$available></strong></h4>
                        <h3 class='text-dark'> $product_title</h3>
                        <h5 class='text-info'>$product_desc</h5>
                        <h5 class='text-danger'>RM $product_price </h5>
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
                      </div>

<?php
include 'footer.php'
?>