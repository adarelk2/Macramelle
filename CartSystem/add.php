<?php
session_start();
$_SESSION['items'][1] = null;
$checkCart = count($_SESSION['items']);
$_SESSION['items'][$checkCart+1] =$_GET['id'];
?>
