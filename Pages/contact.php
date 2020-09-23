<?php
$_SESSION['checkTimeForMail'] = rand(9999,99999);
$cap = $_SESSION['checkTimeForMail'];
?>
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

  function validateEmail(email) {
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
  }
  function sendEmail() 
  {
    message.innerHTML = null;
    var error = new Array();
    var first_Name = document.getElementById("first_Name").value;
    var lastName = document.getElementById("last_Name").value;
    var email = document.getElementById("email").value;
    var subject = document.getElementById("subject").value;
    if (lastName.length < 1)
      error[0] = "Your last name is invalid.";
    if (first_Name.length < 1)
      error[1] = "Your First name is invalid.";
      if (subject.length < 1)
      error[2] = "Your subject  is too short.";
      if (validateEmail(email) == false)
      error[3] = "Your email  is invalid.";
    else if (email.length < 5)
      error[3] = "Your email  is invalid.";
    if (error.length != 0) {
      for (var i = 0; i < error.length; i++) {
        if (error[i] != null)
          message.innerHTML += "<br>- " + error[i];
      }
    }
    if ($("#message").text().length == 0)
    {
  document.getElementById("btn").disabled = true;
      $.ajax({
        url: "phpmailer/sendMail.php",
        type: "POST",
        <?php echo "data: { first_Name: first_Name, lastName: lastName, email: email,subject:subject,cap:$cap}";?>,
        cache: false,
        success: function (result) {
          $("#message").html(result);
            document.getElementById("btn").disabled = false;
        }
      });
    }
  }

</script>
<section class="container mb-3">
  <div class="row p-0 mt-3 col-12 justify-content-between">
  <div id="message" class="mt-3 text-danger  col-12 p-0 mb-3 order-1"></div>
  <div class="col-12 col-sm-8  p-0 m-auto">
  <h2 style="font-family: regularFont;font-size: 1.2em;" class="mb-3 text-center">Contact us </h2>
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
      <label style="width: 150px;" class="col-form-label mr-2" for="email">E-mail:</label>
      <input type="email" name="email" id="email" class="form-control col-lg-8 mb-2" required
        placeholder="Enter your e-mail">
    </div>
    <div class="d-lg-flex">
      <label style="width: 150px;" class="col-form-label mr-2" for="subject">Subject:</label>
      <textarea rows=10 id="subject" class="form-control col-lg-8 mb-2" required></textarea>
    </div>

    <div class="text-center">
      <button type="submit" id="btn" class="btn" style="background:lightcoral;color:#fff;"
        onclick="sendEmail()">Send</button>
      <button type="submit" class="btn btn-dark" onclick="backToStore()">Cancel</button>
    </div>
    </div> </div>
</section>