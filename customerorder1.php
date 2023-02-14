<?php

include('session_r.php');

if(!isset($login_session)){
header('Location: sellerlogin.php');
}



$cheks = implode("','", $_POST['checkbox']);
$sql = "UPDATE ORDERS SET `status` = 'DELIVERED' , `paymentstatus` = 'PAID' WHERE order_ID in ('$cheks')";
$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));

header('Location: customerorder.php');
$conn->close();


?>
