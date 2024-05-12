const sidebar = document.querySelector("#navbarSupportedContent1");
const hamburger = document.querySelector("#hamburger");
hamburger.addEventListener("click", () => {
  sidebar.classList.toggle("hidden");
});
