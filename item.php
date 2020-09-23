<?php
include("function/function.php");
include("settings.php");
include("class/item.php");
checkItem($_GET['id']);
?>
<?php
require_once("template/header.php");
?>
<body onload="init();">


  <main class="container-fluid" style="position:relative;">
  <div id="addToCartMessage" class="center" style=" text-align:center;transition:1s;"></div>

  <div id="item">
    <section class="container center">
      <div class="row  spaceBetween mt-3">
        <div class="col-3">
          <!-- for Mobile-->
          <div class="row col-5 spaceCenter noneForDesktop">
            <div id="image-zoom" class="col-5 mb-3" style="background-image:url(<?php echo getItem("background",$_GET['id']);?>)"></div>
            <div class="col-1-Flex smallImage">
              <img src="<?php echo getItem("background",$_GET['id']);?>" alt="<?php echo getItem("title",$_GET['id']);?>" onclick="setImage('<?php echo getItem('background',$_GET['id']);?>')">
            </div>
            <?php echo getListImagesForMobile($_GET['id']);?>
          </div>
          <!-- for Desktop-->
          <div id="my-gallery" class="noneForMobile vanilla-zoom">
            <div class="sidebar">
              <?php echo "<img src=",getItem("background",$_GET['id'])," class=small-preview>";
               getListImages($_GET['id']);
              ?>
              
            </div>
            <div class="zoomed-image"></div>
          </div>
        </div>
        <div class="col-3">
          <div class="boxIdItem">
            <h2>
            <?php echo getItem("title", $_GET['id']);?> 
          </h2>
            <h2 style="font-family:BoldFont">
            <?php echo getItem("price", $_GET['id']);?>$
            </h2>
            <p>
            <?php echo getItem("subject", $_GET['id']);?>

            </p>
            <div class="row m-auto col-5 spaceArround">
              <button class="BuyBtn" onClick="addToCart(<?php echo $_GET['id'];?>,true,false)"> BUY IT NOW</button>
              <button onClick="addToCart(<?php echo $_GET['id'];?>,false,false)" style="background-color: rgb(74, 73, 73);" class="BuyBtn"> ADD TO CART</button>
              <div class="col-5" style="text-align:center;">
              <?php 
              $getRate = getItem('rate', $_GET['id']);
              makeRate($getRate);
              ?>
              </div>
            </div>
          </div>
        </div>
        <div class="row col-5 mt-3 spaceBetween ">
          <div class="col-5">
            <hr>
          </div>
          <div class="col-5">
            <h2 style="font-family: lightFont;">Top 5 Reviews</h2>
          </div>
          <?php echo getBotReviews();?>
        </div>
        <div class="row col-5 mt-3 spaceBetween ">
            <div class="col-5">
            <h2 style="font-family: lightFont;">More from this Category</h2>
            </div>
          <?php
          $category = getItem("category",$_GET['id']);
           echo getRowItems("Select *from items where category = '$category' LIMIT 5",1);
           ?>
        </div>
      </div>
    </section>
    </div>

  </main>
  <?php require_once("template/footer.php");?>
</body>

</html>