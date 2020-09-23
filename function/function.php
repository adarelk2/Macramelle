<?php
function getBotReviews()
{
    $month_arr = ['January','February','March','May','June','July','August'];
    $lastName_arr = 
    [
        'Faaborg','Fadler','Bacani','Bacher','Naffziger','Nagel','Nahabedian','Padalino','Paczkowski',
        'Paavola','Gadomski','Gadoury','Gaffaney','Bacher','Naffziger','Nagel','Nahabedian','Rachels','Rachow',
        'Rackliff',"D’Arezzo","D’Agata",'Kaelber','Kaffenberger','Kaczanowski','Taflinger','Tafuri'
    ];
    $firstName_arr = 
    [
        "Olivia","Evelyn","Abigail","Sofia","Madison","Camila","Riley","Zoey","Nora","Ellie",
        "Natalie","Violet","Bella","Claire","Skylar","Paisley","Anna","Caroline","Emilia","Lydia",
        "Josephine","Emery","Vivian","Madeline","Rylee"
    ];
    for($i=0; $i < 5;$i++)
    {
        $rand = rand(1,100);
        $randStar = rand(3,10);
        echo "<div class='box2'>
            <span class='date'>
            <i class='fa fa-calendar'></i>",
            $month_arr[$rand % count($month_arr)]," 2020 - Present ",$month_arr[$rand % count($month_arr)],".</span>
            <h3>
            ",$firstName_arr[$rand % count($firstName_arr)]," ",$lastName_arr[$rand % count($lastName_arr)],"
            </h3>
            <span class='Reviews'>
            <p>",makeRate($randStar),"</p>
            </span>
            </div>";
    }
}

function setCuppon($code)
{
    session_start();
    $_SESSION['cuppon'] = $code;
}
function checkLogin()
{
    if(isset($_SESSION['user']) && $_SESSION['user']!= null)
        return 1;
    else
        return 0;
}
function deleteDiscount($code)
{
    global $mysqli;
    $result = $mysqli->query("Select code from cuppon where code = $code")->num_rows; 
    if($result >=1)
    {
        $mysqli->query("UPDATE  cuppon set status=1 where code = $code");   
    }   
}
function checkItem($id)
{
    global $mysqli;
    $result = $mysqli->query("Select idItem from items where idItem = $id")->num_rows;
    if($result ==0)
    {
        header('Location: error404.html');
    }
}
function checkCuppon($colmn)
{
    if(isset($_SESSION['cuppon']))
    {
        $code = $_SESSION['cuppon'];
        global $mysqli;
        $result = $mysqli->query("Select code from cuppon where code = $code  and status=0")->num_rows;  
        if($result >=1)
        {
            $result = $mysqli->query("Select $colmn from cuppon where code = $code ")->fetch_array();
            return $result[$colmn];
        }
        else
            return 0;
    }
    else
        return 0; 
}
function getCartListMobile()
{
    global $mysqli;
    $items = array();
    $_SESSION['items'][1] = null;
    $checkCart = count($_SESSION['items']);
    for($i=1; $i<=$checkCart; $i++)
    {
        $itemClass = new item($mysqli);
        $items[$i] = $itemClass->setItem($_SESSION['items'][$i]);
        if($items[$i]->getPrice() > 0)
        {
            echo "<div class='col-5'>
                <h3 class='m-0' style='text-align:center; font-family: lightFont;'>",$items[$i]->getTitle(),"</h3>
                </div>
                <div class='boxItem col-5'>
                <img src=",$items[$i]->getBackground()," alt=''>  
                </div>
                <div class='col-5'>
                <h3 class='m-0 mb-1'>",$items[$i]->getPrice(),"$</h3>
                </div>
                <div class='col-5 mb-3'>
                <button class='Btn Dark' onClick=deleteFromCart(",$i,")>DELETE</button></div>";
        }
    }
}
function getPriceCart()
{
    global $mysqli;
    $items = array();
    $_SESSION['items'][1] = null;
    $checkCart = count($_SESSION['items']);
    $price = 0;
    for($i=1; $i<=$checkCart; $i++)
    {
        $itemClass = new item($mysqli);
        if($_SESSION['items'][$i] != null)
        {
        $items[$i] = $itemClass->setItem($_SESSION['items'][$i])->getPrice();
        $price += $items[$i];
        }
    }
    if(checkCuppon("mode") !=0)
    {
        $discount = $price / checkCuppon("mode");
        $price = rtrim(rtrim((string)number_format($price - $discount, 2, ".", ""),"0"),".");
    }
    if($price < 0)
    $price =0;
    return $price;
}

function getCartList()
{
    global $mysqli;
    $items = array();
    $_SESSION['items'][1] = null;
    $checkCart = count($_SESSION['items']);
    $price = 0;
    $count = 0;
    for($i=1; $i<=$checkCart; $i++)
    {
        $itemClass = new item($mysqli);
        $items[$i] = $itemClass->setItem($_SESSION['items'][$i]);
        if($items[$i]->getPrice() > 0)
        {
            $count++;
            echo "<div class='col-1'>
                    <h3>",$count,"</h3></div>
                 <div class='col-1'>
                    <h3>",$items[$i]->getId(),"</h3></div>
                <div class='col-1'>
                    <h3>",$items[$i]->getTitle(),"</h3></div>
                <div class='col-1'>
                    <h3>",$items[$i]->getPrice(),"$</h3></div>
                <div class='col-1'>
                    <button onClick=deleteFromCart(",$i,") class='Btn Dark'>DELETE</button>
                </div>";
            $price += $items[$i]->getPrice();
        }
    }
    if(checkCuppon("mode") !=0)
    {
        $firstPrice = $price;
        $discount = $price / checkCuppon("mode");
        $price = rtrim(rtrim((string)number_format($price - $discount, 2, ".", ""),"0"),".");
 

        echo "<div style='background-color:rgb(193, 193, 193);' class='col-5 mb-3 center'><h3>Price: <del>",$firstPrice,"$</del><strong> - ",$price,"$</stroung></h3></div>";
    }
    else
        echo "<div style='background-color:rgb(193, 193, 193);' class='col-5 mb-3 center'><h3>Price: ",$price,"$</stroung></h3></div>";
}
function getItem($col , $id)
{
    global $mysqli;
    $itemClass = new item($mysqli);
    $setItem = $itemClass->setItem($id);
    switch ($col)
    {
        case "title":
            return $setItem->getTitle();
        break;
        case "subject":
            return $setItem->getSubject();
        break;
        case "background":
            return $setItem->getBackground();
        break;
        case "category":
            return $setItem->getCategory();
        break;
        case "price":
            return $setItem->getPrice();
        break;
        case "id":
            return $setItem->getId();
        break;
        case "rate":
            return $setItem->getRate();         
        break;
    }

}
function makeRate($count)
{
    if($count >5)
    $count =5;
    for($i = 0;$i<$count;$i++)
        echo " <span class='fa fa-star checked'></span>";
}
function getRowItems($_query,$_class)
{
    global $mysqli;
    $items = array();
    $select_item = $mysqli->query($_query);
    for($i=0;$row = $select_item->fetch_array();$i++)
    {
        $itemClass = new item($mysqli);
        $items[$i] = $itemClass->setItem($row['idItem']);
        $rate = getItem("rate",$items[$i]->getId());
        echo "<div class='box5 col-$_class'><a href=item.php?id=",$items[$i]->getId(),">
        <img src=",$items[$i]->getBackground()," alt='",$items[$i]->getTitle(),"'>
        <h3>",$items[$i]->getTitle(),"</h3>
        <span style=color:rgb(77, 77, 76)>",$items[$i]->getPrice(),"$</span>
        <br>
        ",makeRate($rate),"
        </a></div>";
    }
}
function getListImages($id)
{
    global $mysqli;
    $select_item = $mysqli->query("Select * from gallery where idItem=$id LIMIT 4");
    for($i=0;$row = $select_item->fetch_array();$i++)
    {
        echo "<img src=",$row['img'], " class='small-preview' alt='",getItem('title',$id),"'>";
    }
}
function getListImagesForMobile($id)
{
    global $mysqli;
    $select_item = $mysqli->query("Select * from gallery where idItem=$id LIMIT 4");
    for($i=0;$row = $select_item->fetch_array();$i++)
    {
        echo "<div class='col-1-Flex smallImage'>
        <img src=",$row['img']," alt='",getItem('title',$id),"' onclick=setImage('$row[img]');>
        </div>";
    }
}

function countItems($select)
{
    global $mysqli;
    $select_item = $mysqli->query($select)->num_rows / 8;
    $num = explode('.', $select_item);
    if(isset($num[1]))
    {
    $select_item++;
    }
    $min = 0;
    $max = 9999;
    $category = 0;
    $choose = "asc";

    if(isset($_GET['min']))
    $min = $_GET['min'];
    if(isset($_GET['max']))
    $max = $_GET['max'];
    if(isset($_GET['category']))
    $category = $_GET['category'];
    if(isset($_GET['choose']))
    $choose = $_GET['choose'];

    echo "<form method=GET action=index.php>
    <input type='hidden' value='shop' name='page'>
    <input type='hidden' value='$category' name='category'>
    <input type='hidden' value='$choose' name='choose'>
    <input type='hidden' value='$min' name='min'>
    <input type='hidden' value='$max' name='max'>";
    for($i=1;$i<=$select_item;$i++)
    {       
        if(isset($_GET['row']))
        {
            if($i == $_GET['row'])
                echo "<input type=submit name=row value=",$i," style='padding:8px;margin-left:12px;border:0;background:gray;color:#fff;cursor:pointer;'>";
       
            else
                echo "<input type=submit name=row value=",$i," style='padding:8px;margin-left:12px;border:0;background:pink;color:#fff;cursor:pointer;'>";
        }
        else
            echo "<input type=submit name=row value=",$i," style='padding:8px;margin-left:12px;border:0;background:gray;color:#fff;cursor:pointer;'>";
    }
    echo "</form>";
}
function getItemBox($select)
{
    global $mysqli;
    $count = 0;
    $items = array();
    $select_item = $mysqli->query($select);
    for($i=0;$row = $select_item->fetch_array();$i++)
    {
        $itemClass = new item($mysqli);
        $items[$i] = $itemClass->setItem($row['idItem']);
    }
    if(isset($_GET['row']))
    {
        if($_GET['row'] ==1 or $_GET['row']==0 or $_GET['row'] ==null)
            $count = 0;
        else
            $count = ($_GET['row']-1) * 8;
    }
    for($i=0;$i <= 7;$i++)
    {
        if(isset($items[$i+$count]))
        {
            $getRate = getItem("rate",$items[$i+$count]->getId());
            echo "<div  class='box5 col-2 mb-3'><a href=item.php?id=",$items[$i+$count]->getId(),">
            <img src=",$items[$i+$count]->getBackground()," alt='",$items[$i+$count]->getTitle(),"'>
            <h3>",$items[$i+$count]->getTitle(),"</h3>
            <span style='color:rgb(77, 77, 76);'>",$items[$i+$count]->getPrice(),"$</span>
            <br>
            ",makeRate($getRate),"
            </a><br><button onClick='addToCart(",$items[$i+$count]->getId(),",true,true);' class='Btn Dark mt-2' style='font-size:.8em;width:35%;border-radius:4px;'>Buy it now</button></div>";
        }
    }
    echo "<div class='col-5 mt-3 '>",countItems($select),"</div>";
}

?>