var btn = document.querySelectorAll(".btn-buy");
[...btn].forEach((item, index) => {
  item.addEventListener("click", () => {
    // btn[index].style.border = "none";
  });
});
