<?php
    include("../function/function.php");
    include("../settings.php");
    include("../class/item.php");
    session_start();
    $time = date('d/m/y');
    $sum = 0;
    $itemsArray = array();
    $paid = 0;
    if($_SESSION['Captcha'] == $_POST['captcha'])
    {
        $rand = rand(100000,999999);
        if(isset($_POST['items']))
        {
            $firstName = $_SESSION['first_Name'];
            $lastName = $_SESSION['lastName'];
            $email = $_SESSION['email'];
            $city = $_SESSION['city'];
            $zip = $_SESSION['zip'];
            $street = $_SESSION['street'];;
            $country = $_SESSION['country'];
            $count = $_POST['items']; 
            while($count !=0)
            {
                $items = new item($mysqli);
                $sum++;
                if($_SESSION['items'][$sum] !=null)
                {
                    $itemsArray[$sum] = $items->setItem($_SESSION['items'][$sum]);
                    $count--;
                    $idItem = $_SESSION['items'][$sum];
                    $title = $itemsArray[$sum]->getTitle();
                    $paid += $itemsArray[$sum]->getPrice();
                    $price = $itemsArray[$sum]->getPrice();
                    $mysqli->query("INSERT INTO orders (`title`,`idItem`,`date`,`status`,`idOrder`, `surname`,`given_name`,`email_address`,`city`,`street`,`country_code`,`postal_code`) VALUES ('$title',$idItem,'$time',0,$rand,'$firstName','$lastName','$email','$city','$street','$country','$zip')");
                }
            }
            $lastPaid = 0;
            $broker = [];
            $broker[0] = checkCuppon("code");
            if($broker[0] >= 1)
            {
                $lastDiscount = $paid / checkCuppon("mode");
                $lastPaid = $paid - $lastDiscount;
            }
            $mysqli->query("INSERT INTO orders_success (`idOrder`,`zen`,`lastZen`,`discount`,`status`) VALUES ($rand,$paid,$lastPaid,$broker[0],0)");
            deleteDiscount($broker[0]);
            session_destroy();
        }
    }
?>