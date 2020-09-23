<?php

include("function/function.php");
include("settings.php");
include("class/item.php");
if(isset($_GET['cuppon']))
setCuppon($_GET['cuppon']);
?>
<?php
  require_once("template/header.php");
?>
<body onload="init()">
<?php
  if(isset($_GET['page']))
  {
    switch($_GET['page'])
      {
      case "about":
        require("template/strip.php");
      break;
      case "policy":
        require("template/strip.php");
      break;
    }
  }
  else
  require("template/strip.php");

?>
  <main class="container-fluid ">
    <?php
  if(isset($_GET['page']))
  {
    switch($_GET['page'])
      {
      case "home":
        require_once("Pages/home.php");
      break;
      case "cart":
        require_once("Pages/cart.php");
      break;
      case "shop":
        require_once("Pages/shop.php");
      break;
      case "policy":
        require_once("Pages/policy.php");
      break;
      case "policy":
        require_once("Pages/policy.php");
      break;
      case "about":
        require_once("Pages/about.php");
      break;      
      case "register":
        require_once("Pages/register.php");
      break;
      case "contact":
        require_once("Pages/contact.php");
      break;
      default:
        require_once("Pages/home.php");
      }
  }
  else
  {
    require_once("Pages/home.php");
  }

    ?>
  </main>
<?php
require_once("template/footer.php");
?>
</body>

</html>