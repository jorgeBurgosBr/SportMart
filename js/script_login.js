document.querySelector("#show-login").addEventListener("click", function () {
   document.querySelector(".popup").classList.add("activa");
});

document.querySelector(".popup .close-btn").addEventListener("click", function () {
   document.querySelector(".popup").classList.remove("activa");
});
