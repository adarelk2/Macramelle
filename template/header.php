<?php
session_start();
include("../settings.php");
include("../class/item.php");
$count=0;
function getCountCartItems()
{
  global $count;
  if(isset($_SESSION['items']))
  {
  for($i=2;$i<= count($_SESSION['items']);$i++)
  {
    if($_SESSION['items'][$i] != null)
    {
      $count++;
    }
  }
}
else
$count =0;
  return $count;
}
function getHeader()
{
    global $mysqli;
  $title = "Macramelle";
  if(isset($_GET['page']))
  switch($_GET['page'])
  {
    case "home":
      $title =$title." - Home";
    break;
    case "shop":
      $title =$title." - Shop";
    break;
    case "about":
      $title =$title." - About";
    break;
    case "cart":
      $title =$title." - Cart";
    break;
    case "policy":
      $title =$title." - Policy";
    break;
    case "contact":
      $title =$title." - Contact";
    break;
  }
  if(isset($_GET['id']))
  {
    
    $itemClass = new item($mysqli);
    $items = $itemClass->setItem($_GET['id']);
    $title = $title." - ".$items->getTitle();
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-177223943-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-177223943-1');
</script>

    
<link rel="icon" href="images/logo.ico">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <meta charset="UTF-8">
    <meta name="keywords" content="art for the wall,wall decoration,basic macrame knots,Macramelle,tables decoration,garden decoration,Home Furniture ">
  <meta name="description" content="Wondering where to get good quality macrame supplies? I've got you Check out our macrame selection for the very best in unique macrame">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $title;?></title>
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="css/responsive.css">
  <script src="js/main.js"></script>
  <script src="js/jquery.js"></script>
  <script src="js/function.js"></script>

  <link href="https://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet">
  <link rel="stylesheet" href="vanilla-zoom/vanilla-zoom.css">
  <script src="vanilla-zoom/vanilla-zoom.js"></script>
  <!-- Only used for the demos ads. Please ignore and remove. -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script>
  function openNav() { document.getElementById("myNav").style.width = "60%"; }
    function closeNav() { document.getElementById("myNav").style.width = "0%"; }


    
    </script>
  
</head>
  <div id="header">
  <header class="container-fluid">
    <div class="container center">
      <div class="mobile">
        <div id="myNav" class="overlay">
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
          <div class="overlay-content">
            <nav>
              <a href="index.php">HOME</a>
              <a href="index.php?page=shop">SHOP</a>
              <a href="index.php?page=about">ABOUT</a>
              <a href="index.php?page=contact">CONTACT</a>
            </nav>
          </div>
        </div>
        <span style="font-size:30px;cursor:pointer;color:rgb(58, 57, 57);" onclick="openNav()">&#9776;</span>
      </div>
      <div class="logo "><a href="index.php"><img src="images/logo.png" alt="Logo"></a></div>
      <div class="desktop">
        <nav>
          <a href="index.php">HOME</a>
          <a href="index.php?page=shop">SHOP</a>
          <a href="index.php?page=about">ABOUT</a>
          <a href="index.php?page=contact">CONTACT</a>
        </nav>
      </div>
      <div class="sideMenu row spaceBetween" style="width:50px;">
      <div style="width:25px;">
      <a href="index.php?page=cart"><i class="fas fa-shopping-cart"></i></a>
      </div>
      <div style="width:20px;height:20px;background:#a15d6e;color:#fff;border-radius:36px;font-size:.8em;" class="center" id="cart"></div>
      <?php $getCart = getCountCartItems();echo "<script>cart.innerHTML =$getCart;</script>";?>

      </div>
    </div>
  </header>
  </div>
<?php
}
getHeader();
?>