// select DOM items

const menuBtn = document.querySelector(".menu-btn");
const menu = document.querySelector(".menu");
const menuNav = document.querySelector(".menu-nav");
const menuBranding = document.querySelector(".menu-branding");
const navItems = document.querySelectorAll(".nav-item"); //using querySelectorAll to grab all the nav items

// set initial state of menu - open or closed, true or false

let showMenu = false; // using let rather than const as it needs to change to true

menuBtn.addEventListener("click", toggleMenu); // listen for clicking on the burger then fire toggleMenu function

function toggleMenu() {
  if (!showMenu) {
    menuBtn.classList.add("close");
    menu.classList.add("show");
    menuNav.classList.add("show");
    menuBranding.classList.add("show");
    navItems.forEach(item => item.classList.add("show")); // loop through each nav link adding show class to each

    // set menu state
    showMenu = true;
  } else {
    menuBtn.classList.remove("close");
    menu.classList.remove("show");
    menuNav.classList.remove("show");
    menuBranding.classList.remove("show");
    navItems.forEach(item => item.classList.remove("show"));

    // set menu state
    showMenu = false;
  }
}
