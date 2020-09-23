<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
  integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<style>
  .strip {
    display: none;
  }

  footer {
    display: none;
  }
</style>
<script>
var availableTags;
  window.onload = function(){
     availableTags = [
      "Alaska","Australia","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","District Of Columbia","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Carolina","North Dakota","Ohio","Oklahoma","Oregon","Utah","Texas","Tennessee","Wyoming","Rhode Island","Pennsylvania","Wisconsin","West Virginia","Washington","Virginia","Vermont","Austria","Belgium","Canada","Croatia","Denmark","Estonia","Finland","France","Germany","Gibraltar","Great Britain","Greece","Hungary","Israel","Italy","Spain","Singapore","Russia","Saudi Arabia","Russia"
    ];
    $( function() {
    $( "#Country" ).autocomplete({
      source: availableTags
    });
  } );
  };
  function validateEmail(email) {
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
  }
  function checkRegister() {
    message.innerHTML = null;
    var error = new Array();
    var first_Name = document.getElementById("first_Name").value;
    var lastName = document.getElementById("last_Name").value;
    var phone = document.getElementById("phone").value;
    var email = document.getElementById("email").value;
    var password = 12345678;
    var country = document.getElementById("Country").value;
    var city = document.getElementById("city").value;
    var street = document.getElementById("street").value;
    var zip = document.getElementById("zip").value;
    var count = 0;
    if (lastName.length < 1)
      error[0] = "Your last name is invalid.";
    if (first_Name.length < 1)
      error[1] = "Your First name is invalid.";
    if (phone.length < 1)
      error[2] = "Your password is invalid.";
    if (password.length < 4)
      error[2] = "Your Password is invalid.";
    if (city.length < 1)
      error[3] = "Your city name is invalid.";
    if (street.length < 1)
      error[4] = "Your street  is invalid.";
    if (validateEmail(email) == false)
      error[5] = "Your email  is invalid.";
    else if (email.length < 5)
      error[5] = "Your email  is invalid.";
    if (zip.length < 1)
      error[6] = "Your Zip code number is invalid.";
      for(var i =0;i<availableTags.length;i++)
      {
        if(country == availableTags[i])
          count = 1;
      }
      if (count ==0)
      error[7] = "Your country is invalid.";
    if (error.length != 0) {
      for (var i = 0; i < error.length; i++) {
        if (error[i] != null)
          message.innerHTML += "<br>- " + error[i];

      }
    }
    if ($("#message").text().length == 0)
      $.ajax({
        url: "Pages/send_register.php",
        type: "POST",
        data: { first_Name: first_Name, lastName: lastName, phone: phone, email: email, password: password, country: country, city: city, street: street, zip: zip },
        cache: false,
        success: function (result) {
          $("#message").html(result);
        }
      });

  }

</script>
<section class="container mb-3">
  <div class="row p-0 mt-3 col-12 justify-content-between">
  <div id="message" class="mt-3 text-danger  col-12 p-0 mb-3 order-1"></div>
  <div class="col-12 col-sm-8  p-0 m-auto">
  <h2 style="font-family: regularFont;font-size: 1.2em;" class="mb-3 text-center">Paypal CheckOut</h2>
  <div class="text-left">
    <div class="d-lg-flex">
      <label style="width: 150px;" class="col-form-label mr-2" for="first_Name">First Name:</label>
      <input type="text" name="first_Name" id="first_Name" class="form-control col-lg-8 mb-2" required
        placeholder="Enter your first name">
    </div>
    <div class="d-lg-flex">
      <label style="width: 150px;" class="col-form-label mr-2" for="last_Name">Last Name:</label>
      <input type="text" name="last_Name" id="last_Name" class="form-control col-lg-8 mb-2" required
        placeholder="Enter your last name">
    </div>
    <div class="d-lg-flex">
      <label style="width: 150px;" for="phone" class="col-form-label mr-2">Phone:</label>
      <input type="tel" name="phone" id="phone" class="form-control col-lg-8 mb-2" required placeholder="+52 XXX">
    </div>
    <div class="d-lg-flex">
      <label style="width: 150px;" class="col-form-label mr-2" for="email">E-mail:</label>
      <input type="email" name="email" id="email" class="form-control col-lg-8 mb-2" required
        placeholder="Enter your e-mail">
    </div>

    <div class="ui-widget d-lg-flex">
      <label style="width: 150px;" class="col-form-label mr-2" for="Country">Country: </label>
          <input id="Country" class="form-control col-lg-8 mb-2" placeholder="Country">
      </div>
    <div class="d-lg-flex">
      <label style="width: 150px;" class="col-form-label mr-2" for="city">City:</label>
      <input type="text" name="city" id="city" class="form-control col-lg-8 mb-2" required
        placeholder="Enter your city">
    </div>
    <div class="d-lg-flex">
      <label style="width: 150px;" class="col-form-label mr-2" for="street">Street:</label>
      <input type="text" name="street" class="form-control col-lg-8 mb-2" id="street" required
        placeholder="Enter your street">
    </div>
    <div class="d-lg-flex mb-3">
      <label style="width: 150px;" class="col-form-label mr-2" for="zip">ZIP:</label>
      <input type="text" name="zip" id="zip" class="form-control col-lg-8 mb-2" required
        placeholder="Enter your zip code">
    </div>
      <div class="d-lg-flex mb-3">
    <span style="font-family:regularFont;">Free worldwide standard shipping</span>
    </div>
    <div class="text-center">
      <button type="submit" class="btn" style="background:lightcoral;color:#fff;"
        onclick="checkRegister()">Pay Now</button>
      <button type="submit" class="btn btn-dark" onclick="backToStore()">Cancel</button>
    </div>
    </div> </div>
</section>