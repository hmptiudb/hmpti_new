let onScroll = false;

// NAVBAR
const navbar = document.getElementsByTagName("nav")[0];
window.addEventListener("scroll", function () {
  // click(true);
  onScroll = true;
  // console.log(onScroll);
  // console.log(window.scrollY);
  if (window.scrollY > 1) {
    navbar.classList.replace("bg-transparent", "nav-color");
  } else if (this.window.scrollY <= 0) {
    navbar.classList.replace("nav-color", "bg-transparent");
  }
});

// NAVBAR MOBILE
const navbar_button = document.getElementById("hamburger_menu");
navbar_button.addEventListener("click", function () {
  // search event
  const search_event = document.getElementById("search_event");
  search_event.classList.toggle("nav-custom-bos");

  // check on scroll
  if (onScroll === false) {
    const bg_transparent = document.querySelector(".bg-transparent");
    // alert("ora di scroll blok");
    if (bg_transparent) {
      navbar.classList.replace("bg-transparent", "nav-color");
    } else {
      navbar.classList.replace("nav-color", "bg-transparent");
    }
  } else {
    navbar.classList.replace("bg-transparent", "nav-color");
  }
});
