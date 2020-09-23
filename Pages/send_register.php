<?php
session_start();
$_SESSION['first_Name'] = $_POST['first_Name'];
$_SESSION['lastName'] = $_POST['lastName'];
$_SESSION['phone'] = $_POST['phone'];
$_SESSION['email'] = $_POST['email'];
$_SESSION['country'] = $_POST['country'];
$_SESSION['city'] = $_POST['city'];
$_SESSION['street'] = $_POST['street'];
$_SESSION['zip'] = $_POST['zip'];
$_SESSION['user'] = 1;
if(isset($_SESSION['items']))
  echo "<script> window.location.href = 'Pages/pay.php'</script>";
else
{
  echo "<script> window.location.href = 'index.php'</script>";
}

?>