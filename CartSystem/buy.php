<?php
////For a single product(buy now)////
session_start();
$id = $_POST['id'];
$_SESSION['items'][1] = $id;
?>

