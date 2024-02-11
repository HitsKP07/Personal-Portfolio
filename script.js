const btn = document.getElementById("button")
const home = document.querySelector(".home")

btn.addEventListener("click", function () {
  home.style.visibility = "visible";
});

document.querySelector(".button-x").addEventListener("click", function () {
  home.style.visibility = "hidden";
});
