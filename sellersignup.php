
<html>
<head>
    <title> Seller Signup | UNIBUKU </title>
    <link rel="shortcut icon" href="images/logo.png">
  </head>

  <link rel="stylesheet" type = "text/css" href ="css/login.css">
  <link rel="stylesheet" type = "text/css" href ="css/bootstrap.min.css">
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>

<body background = 'images/loginwallpaper.jfif'>

    <button onclick="topFunction()" id="myBtn" title="Go to top">
      <span class="glyphicon glyphicon-chevron-up"></span>
    </button>

    <style type="text/css">
      *,
*:before,
*:after{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
body{
    background-color: #BDC3C7;
}
.background{
    width: 430px;
    height: 520px;
    position: absolute;
    transform: translate(-50%,-50%);
    left: 50%;
    top: 50%;
}
.background .shape{
    height: 200px;
    width: 200px;
    position: absolute;
    border-radius: 50%;
}
.shape:first-child{
    background: linear-gradient(
        #1845ad,
        #23a2f6
    );
    left: -80px;
    top: -80px;
}
.shape:last-child{
    background: linear-gradient(
        to right,
        #ff512f,
        #f09819
    );
    right: -30px;
    bottom: -80px;
}
form{
    height: 680px;
    width: 400px;
    background-color: rgba(255,255,255,0.13);
    position: absolute;
    transform: translate(-50%,-50%);
    top: 50%;
    left: 50%;
    border-radius: 10px;
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255,255,255,0.1);
    box-shadow: 0 0 40px rgba(8,7,16,0.6);
    padding: 10px 15px;
}
form *{
    font-family: 'Poppins',sans-serif;
    color: #ffffff;
    letter-spacing: 0.5px;
    outline: none;
    border: none;
}
form h3{
    font-size: 32px;
    font-weight: 500;
    line-height: 42px;
    color:black;
    text-align: center;
}

label{
    display: block;
    margin-top: 30px;
    font-size: 16px;
    color:black;
    font-weight: 500;
}
.style2 {
	font-family: Geneva, Arial, Helvetica, sans-serif;
	color: #000000;
    font-size: 16px;
    color:blue;
}

input{
    display: block;
    height: 60px;
    width: 100%;
    background-color: #4D5656;
    border-radius: 3px;
    padding: 0 10px;
    margin-top: 8px;
    font-size: 18px;
    font-weight: 600;
}
::placeholder{
    color: #e5e5e5;
}
button{
    margin-top: 50px;
    width: 100%;
    background-color: #4D5656;
    color: #fff;
    padding: 15px 0;
    font-size: 18px;
    font-weight: 600;
    border-radius: 5px;
    cursor: pointer;
}
</style>


    <nav class="navbar navbar-inverse navbar-fixed-top navigation-clean-search" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myNavbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Unibuku</a>
        </div>

        <div class="collapse navbar-collapse " id="myNavbar">
          <ul class="nav navbar-nav">
            <li  ><a href="index.php">Home</a></li>
          </ul>

          <ul class="nav navbar-nav navbar-right">
            <li><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Sign Up <span class="caret"></span> </a>
                <ul class="dropdown-menu">
              <li> <a href="customersignup.php"> Customer Sign-up</a></li>

            </ul>
            </li>

            <li><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-log-in"></span> Login <span class="caret"></span></a>
              <ul class="dropdown-menu">
              <li> <a href="customerlogin.php"> Customer Login</a></li>
              <li> <a href="adminlogin.php"> Admin Login</a></li>
              <li> <a href="sellerlogin.php"> Seller Login</a></li>
              

            </ul>
            </li>
          </ul>
        </div>

      </div>
    </nav>

    <form role="form" action="seller_registered_success.php" method="POST">
            <div class="form-group">
            <h3> Create Account</h3>
            
        <label for="username">Full Name :</label>
        <input class="form-control" id="fullname" type="text" name="fullname" placeholder="Your Full Name" required="" autofocus="">
        <label for="password">Username:</label>
        <input class="form-control" id="username" type="text" name="username" placeholder="Your Username" required="">
        <label for="password">Password:</label>
        <input class="form-control" id="password" type="password" name="password" placeholder="Password" required="">
        <label for="password">Email:</label>
        <input class="form-control" id="email" type="email" name="email" placeholder="Email" required="">
        <label for="password">Contact:</label>
        <input class="form-control" id="contact" type="text" name="contact" placeholder="Contact" required="">

        <button class="btn" name="submit" type="submit" value=" Login " style="background-color:#360859; color:white">Submit</button>
    </form>
</body>
</html>
