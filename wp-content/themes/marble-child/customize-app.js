const burger = document.querySelector("#burger");
const navbarLeft = document.querySelector(".navbar-left");
const headerWrapper = document.querySelector(".header-wrapper");
const contentRight = document.querySelector(".content-right");
const footerWrapper = document.querySelector(".footer-wrapper");

function applyStyle(left) {
    navbarLeft.style.left = left;
}

burger.addEventListener("change", (event) => {
    if (event.target.checked) {
        applyStyle("0px");
    } else {
        applyStyle("-250px");
    }
});

function checkScreenSize() {
    const screenWidth = window.innerWidth;
    const navbarLeftPosition = parseInt(navbarLeft.style.left, 10) || 0;

    if (screenWidth <= 850 && navbarLeftPosition === 0) {
        console.log(true);
        applyStyle("-250px");
    } else if (screenWidth > 850 && navbarLeftPosition === -250) {
        applyStyle("0px");
    }
}

// Gọi hàm khi resize màn hình
window.addEventListener("resize", checkScreenSize);

// Gọi hàm khi tải trang
window.addEventListener("DOMContentLoaded", checkScreenSize);