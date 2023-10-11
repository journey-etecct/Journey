// to get current year
function getYear() {
  var currentDate = new Date();
  var currentYear = currentDate.getFullYear();
  document.querySelector("#displayYear").innerHTML = currentYear;
}

getYear();

document.addEventListener(
  "scroll",
  (e) => {
    const scroll = document.documentElement.scrollTop;
    const header = document.querySelector(".header_section");

    if (scroll > 640) {
      header.style.background = "#131313";
    } else {
      header.style.background = "transparent";
    }
  },
  true
);

$("#btn1").on("click", () => {
  window.scroll({ top: 800, behavior: "smooth" });
});
