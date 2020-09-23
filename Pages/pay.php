<?php
include("../function/function.php");
include("../settings.php");
include("../class/item.php");
session_start();
if(checkLogin() !=1)
{
    echo "<script> window.location.href = '../index.php?page=register';</script>";
}
$_SESSION['Captcha'] = rand(100,1000);
$getCap = $_SESSION['Captcha'];
?>
<head>
<link rel="stylesheet" href="../css/index.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="../js/function.js"></script>
<script src="https://www.paypal.com/sdk/js?client-id=Aanyt1oAt3jspLVi2Bbt7Aytj2Q1lLLzZpw7n609gY6BUEx3Lac9YlwMFmQ8MWn1raQuB6ancAWMZIj_&currency=USD" data-sdk-integration-source="button-factory"></script>
<title>
    Paypal CheckOut
</title>
</head>
<body>

<?php 
$price = getPriceCart();
$count=0;
for($i=1; $i<= count($_SESSION['items']); $i++)
{
    if($_SESSION['items'][$i] != null)
    $count++;
}

echo "<script>
paypal.Buttons({
    style: {
        shape: 'rect',
        color: 'blue',
        layout: 'vertical',
        label: 'pay',
        
    },
    createOrder: function(data, actions) {
      return actions.order.create({
            purchase_units: [{
                amount: {
                    value:",$price,"
                }
            }]
        });
    },
    onApprove: function(data, actions) {
        return actions.order.capture().then(function(details) {
              $.ajax({
              url: 'thanks.php',
              type:'POST',
              data:{captcha:$getCap, items:$count},
              }).done(function() {
                  $('#thankYou').append('<h1 style=text-align:center;>Thank you about your order</h1><h3 style=text-align:center;>Order number will sent your email address</h3>');
                  $('#paypal-button-container').css('display','none');
              });
        });
    }
}).render('#paypal-button-container');
</script>";?>
<section style="min-height:100%;" class="container center" style="text-align:center;">
<div class="row">
    <div class="col-3 m-auto">
    <div class="col-5" id="paypal-button-container"></div>
    <div class="col-5 mt-3" style="text-align:center;"><button class="btn pink mb-3" style="font-size:16px; height:50px; border-radius:4px;" onClick="backToStore()">Back to store</button>
</div>
<div id="thankYou"></div>
</scetion>
</body>
