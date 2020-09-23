var timer;
var pause;
function init() {
  vanillaZoom.init('#my-gallery');
}

function openNav() { document.getElementById("myNav").style.width = "60%"; }
function closeNav() { document.getElementById("myNav").style.width = "0%"; }
function setImage(Picture) {
  $('#image-zoom').css('background-image', 'url(' + Picture + ')');
}
function openCheckOut(price) {
  $("main").load('Pages/pay.php');
}
function sendCuppon() {
    document.getElementById("getDiscountBtn").style.background = "#b5b2b2";
    document.getElementById("getDiscountBtn").disabled = true;
    var email = email_id.value;
    
         $.ajax({
        url: "phpmailer/sendDiscount.php",
        type: "POST",
        data: { email: email},
        cache: false,
        success: function (result) {
         getCupponMsg.innerHTML = `<strong>${result}</strong>`;
        document.getElementById("getDiscountBtn").style.background = "gray";
            document.getElementById("getDiscountBtn").disabled = false;


        }
      });
    
  return false;
}
function deleteFromCart(id) {
  $.ajax({
    url: "CartSystem/delete.php",
    type: "POST",
    data: { id: id },
  }).done(function () {
    location.reload();
  });
}
function hideCartMessage() {
  clearInterval(timer);
  timer = setInterval(function () {
    if(pause == false)
    {
    $("#addToCartMessage").css("opacity", 0);
    location.reload();
  pause = true;
    }
  }, 3000);
}
function addToCart(id,_redirect,_target) {
  $.ajax({
    url: "CartSystem/add.php",
    type: "GET",
    data: { id: id },
  }).done(function () {
      if(_redirect == false)
      {
    $("#addToCartMessage").css("opacity", 1);
    $("#addToCartMessage").html("<a href='index.php?page=cart'>Click <strong>here</strong> to see your cart</a>");
    pause = false;
    hideCartMessage();
      }
      else
      {
      if(_target == true)
        window.open("https://macramelle.com/index.php?page=cart");
      else
        window.location.href = "https://macramelle.com/index.php?page=cart";

      }
  });
  $("#header").load("template/header.php");
}


function backToStore() {
  window.location.href = "../index.php";
}
///jquery function ////
$(document).ready(function () {
  $("#goToShop").click(function () {
    window.location.href = "index.php?page=shop";
  });
})
///end jquery ///////
// CREDITS TO https://www.cssscript.com/image-zoom-pan-hover-detail-view/
var addZoom = function (target) {
  // FETCH CONTAINER + IMAGE
  var container = document.getElementById(target),
    imgsrc = container.currentStyle || window.getComputedStyle(container, false),
    imgsrc = imgsrc.backgroundImage.slice(4, -1).replace(/"/, ""),
    img = new Image();

  // LOAD IMAGE + ATTACH ZOOM
  img.src = imgsrc;
  img.onload = function () {
    var imgWidth = img.naturalWidth,
      imgHeight = img.naturalHeight,
      ratio = imgHeight / imgWidth,
      percentage = ratio * 100 + '%';

    // ZOOM ON MOUSE MOVE
    container.onmousemove = function (e) {
      var boxWidth = container.clientWidth,
        xPos = e.pageX - this.offsetLeft,
        yPos = e.pageY - this.offsetTop,
        xPercent = xPos / (boxWidth / 100) + '%',
        yPercent = yPos / (boxWidth * ratio / 100) + '%';

      Object.assign(container.style, {
        backgroundPosition: xPercent + ' ' + yPercent,
        backgroundSize: imgWidth + 'px'
      });
    };

    // RESET ON MOUSE LEAVE
    container.onmouseleave = function (e) {
      Object.assign(container.style, {
        backgroundPosition: 'center',
        backgroundSize: 'cover'
      });
    };
  }
};

window.addEventListener("load", function () {
  addZoom("itemImage");
});