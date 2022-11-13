const menu_toggle = document.querySelector(".menu-toggle");
const menu = document.querySelector(".menu");
const btn = document.querySelector(".search");
const mobile = document.querySelector(".mobile");

btn.addEventListener("click", function () {
  mobile.classList.toggle("hidden");
});
mobile.addEventListener("click", function (e) {
  if (e.target.id != "search_input") {
    mobile.classList.toggle("hidden");
  }
});
menu_toggle.addEventListener("click", function () {
  menu.classList.toggle("hidden");
});
const chart = document.querySelector(".chart");
const menu_chart = document.querySelector(".menu_chart");

chart.addEventListener("click", function () {
  menu_chart.classList.toggle("hidden");
});
const user = document.querySelector(".user");
const menu_user = document.querySelector(".menu_user");

user.addEventListener("click", function () {
  menu_user.classList.toggle("hidden");
});

var Swipes = new Swiper(".swiper-container", {
  loop: true,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  pagination: {
    el: ".swiper-pagination",
  },
  // autoplay: {
  //   delay: 3000,
  //   disableOnInteraction: true,
  // },
});
var show = document.getElementById("show");
var one = document.getElementById("one");
var two = document.getElementById("two");
var three = document.getElementById("three");
document.getElementById("lokasi").onchange = function () {
  show.style.display = "none";
  one.style.display = this.selectedIndex == 0 ? "block" : "none";
  two.style.display = this.selectedIndex == 1 ? "block" : "none";
  three.style.display = this.selectedIndex == 2 ? "block" : "none";
};

$(document).ready(function () {
  $(".minus").click(function () {
    var $input = $(this).parent().find("input");
    var count = parseInt($input.val()) - 1;
    count = count < 1 ? 1 : count;
    $input.val(count);
    $input.change();
    return false;
  });
  $(".plus").click(function () {
    var $input = $(this).parent().find("input");
    $input.val(parseInt($input.val()) + 1);
    $input.change();
    return false;
  });
});

const imgs = document.querySelectorAll(".img-select a");
const imgBtns = [...imgs];
let imgId = 1;

imgBtns.forEach((imgItem) => {
  imgItem.addEventListener("click", (event) => {
    event.preventDefault();
    imgId = imgItem.dataset.id;
    slideImage();
  });
});

function slideImage() {
  const displayWidth = document.querySelector(".img-showcase img:first-child").clientWidth;

  document.querySelector(".img-showcase").style.transform = `translateX(${-(imgId - 1) * displayWidth}px)`;
}

window.addEventListener("resize", slideImage);
