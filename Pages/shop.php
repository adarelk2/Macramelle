
<body>
<section class="container center">
      <div class="row spaceBetween ">
        <h1 style="text-align: center;font-family: lightFont;" class="container-fluid">
          Shop
        </h1>
        <div  style="display:none;" class="Category">
          <h3 style="color:#fff;">
            Category
          </h3>
          <form action="index.php" method="GET">
          <input type=hidden value="shop" name="page">
          <div class="row spaceCenter">
            <div class="box">
                <label for="firstPrice"></label><input type="number" name="min" placeholder="min"  id="firstPrice">
            </div>
              <div class="box">
                <label for="lastPrice"></label><input type="number" name="max" placeholder="max" >
                </div>
                <div class="box">
                  <label for="choose"></label>
                 <select name="choose" id="choose">
                  <option value="desc">hige to low</option>
                  <option value="asc">lower to hige</option>
                 </select>   
                </div>
                 <input type="hidden" name="category">
                 
                <div class="box">
                  <button input type="submit">Save</button>
                </div>
            </div>
          </form>
        </div>
        <div class="items" data-aos='fade-up'>
          <div class="row spaceBetween"  >
            <?php 
            $min = 1;
            $max = 9999;
            $getOrder = 'price asc';
            $getCategory = "0";
            $query = null;
            if(isset($_GET['min']))
            {
              if($_GET['min'] > 0)
              $min = $_GET['min'];
            }
            if(isset($_GET['max']))
            {
              if($_GET['max'] > 0)
              $max = $_GET['max'];
            }
            if(isset($_GET['choose']))
            {
              switch($_GET['choose'])
              {
                case 'asc':
                  $getOrder = 'price asc';
                  break;
                  case 'desc':
                    $getOrder = 'price desc';
                  break;
                  default:
                  $getOrder = 'price desc';
                break;
              }
            }
            if(isset($_GET['category']))
            {
              switch($_GET['category'])
              {
                  case "yourself":
                    $getCategory = "yourself";
                  break;
                  case 'walls':
                    $getCategory = "walls";
                  break;
                  case 'tables':
                    $getCategory = "tables";
                  break;
                  case 'outside':
                    $getCategory = "outside";
                  break;
                  default:
                  $getCategory = "0";
                break;
              }
            }
            if($getCategory == "0")
            {
             $query = "SELECT *from items where price >= $min and price <= $max order by $getOrder";
             }
            else
            {
            $query = "SELECT *from items where price >= $min and price <= $max and category='$getCategory' order by $getOrder";
            }
            getItemBox($query);?>
          </div>
        </div>
      </div>
 <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>
       
</section>   
</body>