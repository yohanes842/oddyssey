require("./bootstrap");

import $ from "jquery";
window.$ = window.jQuery = $;

//Navbar active
if (document.title == "Oddyssey | Dashboard") {
    $("#navbar-dashboard").addClass("active");
} else if (document.title == "Oddyssey | Your Cart") {
    $("#navbar-cart").addClass("active");
}

//Notification
const notification = $(".notification");
const close_notification = $("#close-btn-notification");

if (notification) {
    setTimeout(() => {
        notification.animate({ opacity: 0 }, 2000);
    }, 2000);
    setTimeout(() => {
        notification.parent().empty();
    }, 5000);
}

close_notification?.on("click", () => {
    notification.css("opacity", 0);
    notification.parent().empty();
});

//checkout
const checkout_form = $("#checkout");
const checkout_button = $("#checkout-button");
const checkout_exit = $("#checkout-exit-button");

checkout_button?.on("click", () => {
    checkout_form.css("display", "block");
});

checkout_exit?.on("click", () => {
    checkout_form.css("display", "none");
});

//Carousel
const slideBox = $("#image-carousel");
slideBox.css("left", "-30vw");

const leftArrow = $("#arrowLeft");
const rightArrow = $("#arrowRight");
let slideInterval;

function moveLeft() {
    clearInterval(slideInterval);
    leftArrow.off("click", moveLeft);
    rightArrow.off("click", moveRight);

    const last = $(".carousel-image-container").last();
    const current = $(".carousel-image-container").first().next();

    slideBox.animate({ left: "0vw" }, 500, "linear");
    setTimeout(() => {
        last.prependTo(slideBox);
        slideBox.animate({ left: "-30vw" }, 0);
        leftArrow.on("click", moveLeft);
        rightArrow.on("click", moveRight);
    }, 500);

    automation_slide();
}

function moveRight() {
    clearInterval(slideInterval);
    leftArrow.off("click", moveLeft);
    rightArrow.off("click", moveRight);

    const first = $(".carousel-image-container").first();
    const current = first.next();

    slideBox.animate({ left: "-60vw" }, 500, "linear");
    setTimeout(() => {
        first.appendTo(slideBox);
        slideBox.animate({ left: "-30vw" }, 0);
        leftArrow.on("click", moveLeft);
        rightArrow.on("click", moveRight);
    }, 500);

    automation_slide();
}

function automation_slide() {
    slideInterval = setInterval(moveRight, 5500);
}

if (slideBox) {
    window.addEventListener("load", automation_slide);
    leftArrow.on("click", moveLeft);
    rightArrow.on("click", moveRight);
}
