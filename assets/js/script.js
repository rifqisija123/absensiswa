// Memanggil Class Sidebar
const menuList = document.querySelector(".menu-list");
const hamMenu = document.querySelector(".navbar-icon-left");
const sidebar = document.querySelector("aside");
const headerSidebar = document.querySelector(".header-title");
const menuTitle = document.querySelector(".menu-title");
const menuTitle2 = document.querySelector("#menu-title2");
const navbar = document.querySelector(".navbar-container");
const logout = document.querySelector(".log-out");
const garis1 = document.querySelector(".garis1");
const garis2 = document.querySelector(".garis2");
const dropdown = document.querySelector(".dropdown-menu");
const dropdownClose = document.querySelector(".dropdown-menu.close");
const dropdown2 = document.querySelector("#dropdown-2");
const iconDropdown = document.querySelector(".dropdown");

// Memanggil Class Navbar
const search = document.querySelector(".navbar-icon-right");
const searchBox = document.querySelector(".navbar-icon-right");
const searchInput = document.querySelector(".navbar-icon-right input");
const searchIcon = document.querySelector("#icon-search");

// Menu Dropdown Sidebar
document.addEventListener("DOMContentLoaded", function () {
  const menuToggles = document.querySelectorAll(".menu");
  menuToggles.forEach((toggle) => {
    toggle.addEventListener("click", function (event) {
      event.preventDefault();
      const submenu = this.nextElementSibling;
      const arrow = this.querySelector(".dropdown");
      if (submenu.classList.contains("open")) {
        submenu.classList.remove("open");
        arrow.style.transform = "rotate(0deg)";
      } else {
        submenu.classList.add("open");
        arrow.style.transform = "rotate(180deg)";
      }
    });
  });
});

// Sidebar Menu List
hamMenu.addEventListener("click", () => {
  sidebar.classList.toggle("close");
  navbar.classList.toggle("close");
  headerSidebar.classList.toggle("close");
  menuTitle.classList.toggle("close");
  menuTitle2.classList.toggle("close");
  menuList.classList.toggle("close");
  logout.classList.toggle("close");
  garis1.classList.toggle("close");
  garis2.classList.toggle("close");
  dropdown.classList.toggle("close");
  dropdown2.classList.toggle("close");
  iconDropdown.classList.toggle("close");
});

// Navbar Search Input
search.addEventListener("click", () => {
  search.classList.toggle("active");
  searchInput.focus();
});
searchIcon.addEventListener("click", (event) => {
  event.stopPropagation();
});
searchInput.addEventListener("click", (event) => {
  event.stopPropagation();
});

// Untuk ketika di klik selain elemen yang dipanggil maka akan menghilangkan class
document.addEventListener("click", (event) => {
  if (
    !search.contains(event.target) &&
    !searchBox.contains(event.target) &&
    !searchIcon.contains(event.target)
  ) {
    search.classList.remove("active");
  }
});
