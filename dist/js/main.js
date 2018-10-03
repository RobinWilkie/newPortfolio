// Menu button add and remove classes for animation
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

// modal functionality
$(function() {
  $("body").on("click", ".modal-img", function(event) {
    var $img = $(event.target);
    var index = $img.data("index");
    var $modal = $("#projectModal" + index);
    $modal.css("display", "block");
  });

  // function to close modal with button
  $("body").on("click", ".modal .closeBtn", function(event) {
    var $modal = $(event.target).closest(".modal");
    $(".modal").fadeOut(500);
  });
});

// function to close modal clicking outside
$(document).click(function(e) {
  if ($(e.target).is(".modal")) {
    $(".modal").fadeOut(500);
  }
});

// typewriter effect for skills section

// function takes in the span, the data words and wait time until text deletion
const typeWriter = function(txtElement, words, wait = 3000) {
  this.txtElement = txtElement;
  this.words = words;
  this.txt = "";
  this.wordIndex = 0;
  this.wait = parseInt(wait, 10);
  this.type();
  this.isDeleting = false;
};

// Type method
typeWriter.prototype.type = function() {
  // get the current index of the word
  const currentWord = this.wordIndex % this.words.length;
  // get the actual text of the current word
  const fullTxt = this.words[currentWord];

  // check if in deleting state - false by default
  if (this.isDeleting) {
    // remove character
    this.txt = fullTxt.substring(0, this.txt.length - 1);
  } else {
    // add character
    this.txt = fullTxt.substring(0, this.txt.length + 1);
  }

  // insert this text into new span element inside current span
  this.txtElement.innerHTML = `<span class="txt">${this.txt}</span>`;

  // set the type speed - initially 300 but variable
  let typeSpeed = 100;

  if (this.isDeleting) {
    typeSpeed /= 2; // halves the typespeed when deleting is true to go faster
  }

  // if not deleting and text has reached the end of the word then pause
  if (!this.isDeleting && this.txt === fullTxt) {
    typeSpeed = this.wait;
    this.isDeleting = true;
  } else if (this.isDeleting && this.txt === "") {
    this.isDeleting = false;
    // move to next word by incrementing the word index to move to next in array
    this.wordIndex++;
    // now pause before nnext word
    typeSpeed = 500;
  }

  setTimeout(() => this.type(), typeSpeed);
};

// init when dom loads
document.addEventListener("DOMContentLoaded", init);

// initiate app
function init() {
  const txtElement = document.querySelector(".txt-type");
  const words = JSON.parse(txtElement.getAttribute("data-words")); // parse data words to get values rather than just array
  const wait = txtElement.getAttribute("data-wait");

  // initiate typewriter
  new typeWriter(txtElement, words, wait);
}
