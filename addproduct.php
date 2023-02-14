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
    <h1>Add New book</h1>
  </div>
</div>

<div class="container" style="width:95%;">

<?php
include 'connection.php';

if(isset($_POST['btn_save']))
{
$product_name=$_POST['product_name'];
$details=$_POST['details'];
$price=$_POST['price'];
$quantity=$_POST['quantity'];
$available=$_POST['available'];
$contact=$_POST['contact'];

//picture coding
$picture_name=$_FILES['picture']['name'];
$picture_type=$_FILES['picture']['type'];
$picture_tmp_name=$_FILES['picture']['tmp_name'];
$picture_size=$_FILES['picture']['size'];

if($picture_type=="image/jpeg" || $picture_type=="image/jpg" || $picture_type=="image/png" || $picture_type=="image/gif")
{
	if($picture_size<=50000000)
	
		$pic_name=time()."_".$picture_name;
		move_uploaded_file($picture_tmp_name,"product_images/".$pic_name);
		

$sql="INSERT into products ( product_title,product_price, product_desc, product_image,quantity,available,contact) values ('$product_name','$price','$details','$pic_name','$quantity','$available','$contact')"; 
//echo 'here'.$sql;
$query = mysqli_query($conn,$sql) or die ("query incorrect");
 if($query > 0)
			{
				echo "<script language='javascript'>alert('Successfully Added New Book')</script>";
				echo "<meta http-equiv='refresh' content='0; url=sellerindex.php'>";
			}else
			{
				echo "<script language='javascript'>alert('Failed to Add New Book')</script>";
				echo "<meta http-equiv='refresh' content='0; url=sellerindex.php'>";                                        
			}
}

mysqli_close($conn);
}

?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <form action="" method="post" type="form" name="form" enctype="multipart/form-data">
          <div class="row">
          
                
         <div class="col-md-7">
            <div class="card">
              <div class="card-header card-header-primary">
                <h3 class="title">Add Product</h3>
              </div>
              <div class="card-body">
                
                  <div class="row">
                    
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Book Title</label>
                        <input type="text" id="product_name" required name="product_name" class="form-control">
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="">
                        <label for="">Add Image</label>
                        <input type="file" name="picture" required class="btn btn-fill btn-success" id="picture" >
                      </div>
                    </div>
                     <div class="col-md-12">
                      <div class="form-group">
                        <label>Description</label>
                        <textarea rows="4" cols="80" id="details" required name="details" class="form-control"></textarea>
                      </div>
                    </div>
                  
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Price (RM)</label>
                        <input type="text" id="price" name="price" required class="form-control" >
                      </div>
                    </div>
                    <div class="col-md-12">
                    <div class="form-group">
                        <label>Contact Number</label>
                        <input type="text" id="contact" name="contact" required class="form-control" >
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Quantity</label>
                        <input type="text" id="quantity" required name="quantity" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Availability</label>
                          <select name="available" id="available">
                            <option value="Ready Stock" selected="selected">Ready Stock</option>
                            <option value="Sold Out" >Sold Out</option>
                    </select>
                    </div>
                    </div>
                  </div>
                 
                  
                
              </div>
              
            </div>
          </div>

                
              </div>
              <div class="card-footer">
                  <button type="submit" id="btn_save" name="btn_save" required class="btn btn-fill btn-primary">Add Book</button>
              </div>
            </div>
          </div>
          
        </div>
         </form>
          
        </div>
      </div>

</body>
</html>
