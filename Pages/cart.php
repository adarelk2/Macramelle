
<div class="CartForMobile noneForDesktop">
    <div class="container center">
        <div class="row spaceBetween">
            <div style="min-height: 58px;" class="center">
                <h3 style="font-family: regularFont;">
                    Price: <?php echo getPriceCart();?>$
                </h3>
            </div>
            <div style="min-height: 58px;" class="center">
            <form method="POST" action="Pages/pay.php"> <button style=font-size:1em; class="Btn Pink" onClick="openCheckOut(<?php echo getPriceCart();?>)">CheckOut</button></form>
            </div>
        </div>
    </div>
</div>
<section class="container center">
    <div id="showCartDesktop" class="row border  spaceArround noneForMobile">
        <div class="col-5">
            <h2 style="font-family: regularFont;">Cart</h2>
        </div>
        <div class="col-1" style="font-family: boldFont;">
            <h3>
                #
            </h3>
        </div>
        <div class="col-1" style="font-family: boldFont;">
            <h3>
                ID
            </h3>
        </div>
        <div class="col-1" style="font-family: boldFont;">
            <h3>
                Item
            </h3>
        </div>
        <div class="col-1" style="font-family: boldFont;">
            <h3>
                Price
            </h3>
        </div>
        <div class="col-1" style="font-family: boldFont;">
            <h3>
                DELETE
            </h3>
        </div>
        <?php echo getCartList();?>
        <?php if(getPriceCart() >1)
        {
            ?>
        <div class="col-5  mb-3">
            <form method="POST" action="Pages/pay.php"><button style =font-size:1em; class="Btn Pink">CheckOut</button></form>
        </div>
        <?php }?>
        <div id="checkOut" style="min-height=400px width:500px;" class="col-5">

        </div>
    </div>

    <div class="row  spaceArround noneForDesktop mb-3">
        <div class="col-12">
            <h2>Cart</h2>
        </div>
        <?php getCartListMobile();?>
    </div>
</section>