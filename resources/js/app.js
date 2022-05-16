require("./bootstrap");

import $ from "jquery";
window.$ = window.jQuery = $;

//Notification
const notification = $(".notification");
const close_notification = $("#close-btn-notification");

setTimeout(() => {
    notification.animate({ opacity: 0 }, 2000);
}, 17000);
setTimeout(() => {
    notification.parent().empty();
}, 20000);

close_notification.on("click", () => {
    // notification.animate({ opacity: 0 }, 2000);
    // setTimeout(() => {
    //     notification.parent().empty();
    // }, 2000);
    notification.parent().empty();
});

//Carousel
const slideBox = $("#image-carousel");
slideBox.css("left", "-30vw");

const leftArrow = $("#arrowLeft");
const rightArrow = $("#arrowRight");

function moveLeft() {
    leftArrow.off("click", moveLeft);
    rightArrow.off("click", moveRight);

    const last = $(".carousel-image-container").last();
    const current = $(".carousel-image-container").first().next();

    slideBox.animate({ left: "0vw" }, 1000, "linear");
    setTimeout(() => {
        last.prependTo(slideBox);
        slideBox.animate({ left: "-30vw" }, 0);
        leftArrow.on("click", moveLeft);
        rightArrow.on("click", moveRight);
    }, 1000);
}

function moveRight() {
    leftArrow.off("click", moveLeft);
    rightArrow.off("click", moveRight);

    const first = $(".carousel-image-container").first();
    const current = first.next();

    slideBox.animate({ left: "-60vw" }, 1000, "linear");
    setTimeout(() => {
        first.appendTo(slideBox);
        slideBox.animate({ left: "-30vw" }, 0);
        leftArrow.on("click", moveLeft);
        rightArrow.on("click", moveRight);
    }, 1000);
}

leftArrow.on("click", moveLeft);
rightArrow.on("click", moveRight);
