
<body>
<section class="container center">
      <div class="row spaceArround mb-3">
        <div class="titleRow center">
          <div>
            <h2>
              Most Pupulars
            </h2>
            <span style="color:#cb909f;margin:0;"> The best productions from us
            </span>
          </div>
        </div>
        <?php echo getRowItems("Select * from items order by id asc LIMIT 4",1);?>
      </div>
    </section>
    <section class="graySection">
      <div class="container center">
        <div class="row spaceArround">
          <div class="box4 borderRight">
            <i class="fas fa-star"></i>
            <h3>
              Five stars review
            </h3>
          </div>
          <div class="box4 borderDesktop">
            <i class="fas fa-send"></i>
            <h3>
              Free Delivery
            </h3>
          </div>
          <div class="box4 borderRight ">
            <i class="fas fa-refresh "></i>
            <h3>
              90 Days <strong>Return</strong>
            </h3>
          </div>
          <div class="box4 ">
            <i class="fas fa-heart"></i>
            <h3>
              Specials OFFERS
            </h3>
          </div>
        </div>

      </div>
    </section>

    <section class="Cuppon">
      <div class="container center">
        <div class="box">
          <h2>
            Get Out Speical Discount
          </h2>
          <p>
            Sign up to our Newsletter and get 10% discount off to your next purcahse
          </p>
          <form onSubmit="return sendCuppon();">
            <input type="email" id="email_id" required placeholder="E-mail Adress"><button type="submit" id="getDiscountBtn">Get coupon</button>
            <div id="getCupponMsg" class="mt-3"></div>
          </form>
        </div>
      </div>
    </section>
</body>