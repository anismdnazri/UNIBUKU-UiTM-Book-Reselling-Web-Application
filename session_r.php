<?php
require 'connection.php';


session_start();

$user_check=$_SESSION['login_user3'];

// SQL Query To Fetch Complete Information Of User
$query = "SELECT username FROM seller WHERE username = '$user_check'";
$ses_sql = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($ses_sql);
$login_session =$row['username'];


?>
