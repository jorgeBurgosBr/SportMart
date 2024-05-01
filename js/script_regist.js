document.querySelector("#show-regis").addEventListener("click", function () {
   document.querySelector(".popup-regis").classList.add("active2");
});

document.querySelector(".popup-regis .close-btn").addEventListener("click", function () {
   document.querySelector(".popup-regis").classList.remove("active2");
});
