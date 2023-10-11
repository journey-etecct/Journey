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

    const media = window.matchMedia("(min-width: 992px)");

    if (scroll > (media.matches ? 640 : 50)) {
      header.style.background = media.matches ? "#131313" : "#222";
    } else {
      header.style.background = "transparent";
    }
  },
  true
);

$("#btn1").on("click", () => {
  window.scroll({ top: 800, behavior: "smooth" });
});
