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

<div class="container">
    <div class="jumbotron">
     <h2 align center>Hello Seller !</h2>
    </div>
    </div>
<div class="container">
    <div class="container">
    	<div class="col">

    	</div>
    </div>


    	<div class="col-xs-3" style="text-align: center;">

    	<div class="list-group">
    		<a href="customerorder.php" class="list-group-item ">Customer Order</a>
    	</div>
    </div>

</div>

  </body>
</html>
