<?php
session_start();
require 'connection.php';

if(!isset($_SESSION['login_user4'])){
header("location: adminlogin.php");
}
?>
<!DOCTYPE html>
<html>

  <head>
    <title> Admin Dashboard </title>
    <link rel="shortcut icon" href="images/LogoImages.png">
  </head>

  <link rel="stylesheet" type = "text/css" href ="css/mygorcery.css">
  <link rel="stylesheet" type = "text/css" href ="css/bootstrap.min.css">
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>

  <body>

  <style type="text/css">
	body{
    background: linear-gradient(45deg, #49a09d, #5f2c82);
    display: flex;
    justify-content: center;
    align-items: center;
}

.header1 {
padding: 1px;
border-radius: 10px;
text-align: center;
color:white;
font-size: 10px;
font-family: sans-serif;
text-align: center;
 background: linear-gradient(45deg, #49a09d, #D896F1 );  
}

.search-container:hover{
  animation: hoverShake 0.25s linear 3;
}

table {
	width: 800px;
	border-radius: 10px;
	border-collapse: collapse;
	overflow: hidden;
	box-shadow: 0 0 20px rgba(0,0,0,0.1);
}

th,
td {
	padding: 15px;
	background-color: rgba(255,255,255,0.1);
	color: #fff;
}

th {
	text-align: left;
}

thead {
	th {
		background-color: #55608f;
	}
}

.style2 {
	font-family: Geneva, Arial, Helvetica, sans-serif;
	color: #000000;
    font-size: 30px;
    color:white;
}

.style3 {
	font-family: Geneva, Arial, Helvetica, sans-serif;
	color: #000000;
    font-size: 25px;
    color:white;
}


.button1 {
  background-color: #4BB5B5; 
  color: white; 
  border: 3px solid #000000;
}

.button1:hover {
  background-color: #1a8cff;
  color: white;
}

.style4 {
	font-family: Geneva, Arial, Helvetica, sans-serif;
	color: #000000;
    font-size: 18px;
    color:black;
}

tbody {
	tr {
		&:hover {
			background-color: rgba(255,255,255,0.3);
		}
	}
	td {
		position: relative;
		&:hover {
			&:before {
				content: "";
				position: absolute;
				left: 0;
				right: 0;
				top: -9999px;
				bottom: -9999px;
				background-color: rgba(255,255,255,0.2);
				z-index: -1;
			}
		}
	}
}

</style>


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
          <a class="navbar-brand" href="adminindex.php">UniBuku</a>
        </div>

        <div class="collapse navbar-collapse " id="myNavbar">
          <ul class="nav navbar-nav">
            <li><a href="adminindex.php">Home</a></li>
          </ul>

          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-user"></span> Welcome Admin </a></li>
            <li><a href="logout_a.php"><span class="glyphicon glyphicon-log-out"></span> Log Out </a></li>
          </ul>
        </div>

      </div>
    </nav>
    </nav>
    <center><table style="border:groove 0px #CCCCCC" width="50%"></center>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<tr>
  <div class="header1"  style="background-color:#D3AAE2  ;"><h1><span class="style2">Hello Admin</h1></div></span>
</tr>
    </div>
          <!-- End Navbar -->
          <div class="content">
            <div class="container-fluid">
             <div class="panel-body">
            <a
            <?php
   
              include 'connection.php';
              if(!empty($_GET['action']))
              {
              $customer_id=$_GET['customer_id'];
              
              /*this is delete query*/
              mysqli_query($conn,"DELETE from customer where customer_id='$customer_id'")or die("query is incorrect...");
              }

              ?>>

                <?php  //success message
                if(isset($_POST['success'])) {
                $success = $_POST["success"];
                echo "<h1 style='color:#0C0'>Your Product was added successfully &nbsp;&nbsp;  <span class='glyphicon glyphicon-ok'></h1></span>";
                }
                ?></a>
                    </div>
                    
                    <div class="col-md-14">
                <div class="card ">
                  <div class="card-header card-header-primary">
                    <h4 class="card-title"><span class="style3"> Customer List</h4></span>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive ps">
                      <table class="table table-hover tablesorter " id="">
                        <thead class=" text-primary">
                            <tr><th>Full Name</th><th>Username</th><th>Email</th><th>Contact</th><th>Address</th><th>Action</th>
                        </tr></thead>
                        <tbody>
                          <?php 
                            $result=mysqli_query($conn,"select * from customer")or die ("query 1 incorrect.....");
    
                            while(list($customer_id,$fullname,$username,$email,$contact,$address)=mysqli_fetch_array($result))
                            {	
                            echo "<tr><td>$fullname</td><td>$username</td><td>$email</td><td>$contact</td><td>$address</td>";
    
                            echo"<td>
                                  <div class='ripple-container'></div></a>
                            <a href='adminindex.php?customer_id=$customer_id&action=delete'  type='button' rel='tooltip' title='Delete Customer' class='btn btn-fill btn-primary' data-original-title='Delete Book'>
                            <class='material-icons'>Delete Customer</class>
                                  <div class='ripple-container'></div></a>
                            </td></tr>";
                            //echo "<script language='javascript'>alert('Successfully Deleted Customer')</script>";
                            }
                            ?>
                        </tbody>
                      </table>
                    <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
                  </div>
                </div>
              </div>

              <div class="col-md-14">
                <div class="card ">
                  <div class="card-header card-header-primary">
                    <h4 class="card-title"><span class="style3">Order History</h4></span>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive ps">
                      <table class="table table-hover tablesorter " id="">
                        <thead class=" text-primary">
                            <tr><th>ID</th><th>Book Name</th><th>Book Price</th><th>Quantity</th><th>Order Date</th><th>Buyer</th><th>Status</th><th>Payment Status</th>
                        </tr></thead>
                        <tbody>
                          <?php 
                            $result=mysqli_query($conn,"select * from orders")or die ("query 1 incorrect.....");
                            $i=1;
                            while(list($order_ID,$bookname,$price,$quantity,$order_date,$username,$status,$paymentstatus)=mysqli_fetch_array($result))
                            {	

                            echo "<tr><td>$order_ID</td><td>$bookname</td><td>$price</td><td>$quantity</td><td>$order_date</td><td>$username</td><td>$status</td><td>$paymentstatus</td>
    
                            </tr>";
                            }
                            ?>
                        </tbody>
                      </table>
                    <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
                  </div>
                </div>
              </div>
              
              <div class="row">
                <div class="col-md-6">
                <div class="card ">
                  <div class="card-header card-header-primary">
                    <h4 class="card-title"><span class="style3"> Book List</h4></span>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive ps">
                      <table class="table table-hover tablesorter " id="">
                        <thead class=" text-primary">
                            <tr><th>ID</th><th>Book</th><th>Price</th>
                        </tr></thead>
                        <tbody>
                          <?php 
                            $result=mysqli_query($conn,"select * from products")or die ("query 1 incorrect.....");
                            $i=1;
                            while(list($product_id,$product_title,$product_price)=mysqli_fetch_array($result))
                            {	

                            echo "<tr><td>$product_id</td><td>$product_title</td><td>$product_price</td>
    
                            </tr>";
                            }
                            ?>
                        </tbody>
                      </table>
                    <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                <div class="card ">
                  <div class="card-header card-header-primary">
                    <h4 class="card-title"><span class="style3"> Seller List</h4></span>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive ps">
                      <table class="table table-hover tablesorter " id="">
                        <thead class=" text-primary">
                            <tr><th>ID</th><th>Name</th><th>Contact</th>
                        </tr></thead>
                        <tbody>
                          <?php 
                            $result=mysqli_query($conn,"select * from seller")or die ("query 1 incorrect.....");
                            $i=1;
                            while(list($Seller_ID,$fullname,$contact)=mysqli_fetch_array($result))
                            {	

                            echo "<tr><td>$Seller_ID</td><td>$fullname</td><td>$contact</td>
    
                            </tr>";
                            }
                            ?>
                        </tbody>
                      </table>
                    <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
                  </div>
                </div>
              </div>

            </div>
          </div>