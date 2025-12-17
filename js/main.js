const navbar = document.querySelector(".navbar");
window.addEventListener("scroll", () => {
  if (window.scrollY > 1) {
    navbar.classList.add("navbar-light");
  } else {
    navbar.classList.remove("navbar-light");
  }
});
