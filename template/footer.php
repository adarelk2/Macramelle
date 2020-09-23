<?php
function getFooter()
{
?>
<footer>
    <section class="container-fluid">
      <div class="container center">
        <div class="row spaceBetween ">
          <div class=" box5 col-2">
            <h3>
              INFORMATION
            </h3>
            <li>
            <a href="index.php?page=shop">Shop</a>
            </li>
            <li>
            <a href="index.php?page=about">About us</a>
            </li>
            <li>
            <a href="index.php?page=policy">Policy</a>
            </li>            
            <li>
            <a href="index.php?page=contact">Contact us</a>
            </li>
            <li>
             <a href="sitemap.html">Site map</a>
            </li>
          </div>
          <div class="box5 col-1">
            <h3>
              MY ACCOUNT
            </h3>
            <li>
            <a href="index.php?page=register">CheckOut</a>
            </li>
            <li>
            <a href="index.php?page=cart">Cart</a>
            </li>
          </div>
          <div class="box5 col-1">
            <h3>TAGS</h3>
            <li>
            <a href="index.php?page=shop&category=yourself">Do it yourself</a>
            </li>
            <li>
            <a href="index.php?page=shop&category=walls">Macrame for walls</a>
            </li>
            <li>
            <a href="index.php?page=shop&category=tables">Macrame for tables</a>
            </li>
            <li>
            <a href="index.php?page=shop&category=outside">Macrame for garden</a>
            </li>
          </div>
          <div class="box5 col-1">
            <h3>
              CONTACT INFO
            </h3>
            <li>
             <a href = "mailto: support@macramelle.com"><i class="fas fa-mail-forward"></i> support@macramelle.com</a>
            </li>
            <li>
              <a href="https://api.whatsapp.com/send?phone=972545899779" target=_blank><i class="fas fa-phone"></i> +972-54-5899-779</a>
            </li>
          </div>
        </div>
      </div>
    </section>
    <div class="container center">
      <div class="row spaceCenter">
        <h3>
          website built by <a href="https://macramelle.com"><span style="color:#fff;">Macramelle.com</span></a>
        </h3>
      </div>
    </div>
  </footer>

<?php
}
echo getFooter();
?>