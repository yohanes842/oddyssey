const { first } = require("lodash");

require("./bootstrap");

//Notification
const notification = $(".notification");
const close_notification = $("#close-btn-notification");

setTimeout(() => {
    notification.animate({ opacity: 0 }, 1500);
}, 1000);
setTimeout(() => {
    notification.parent().empty();
}, 4000);

close_notification.on("click", () => {
    notification.parent().empty();
});

//Carousel
const slideBox = $("#image-carousel");
slideBox.css("left", "-27vw");

const leftArrow = $("#arrowLeft");
const rightArrow = $("#arrowRight");

function moveLeft() {
    leftArrow.off("click", moveLeft);
    rightArrow.off("click", moveRight);

    const last = $(".carousel-image-card").last();
    const current = $(".carousel-image-card").first().next();

    slideBox.animate({ left: "0vw" }, 1000, "linear");
    setTimeout(() => {
        last.prependTo(slideBox);
        slideBox.animate({ left: "-27vw" }, 0);
        leftArrow.on("click", moveLeft);
        rightArrow.on("click", moveRight);
    }, 1000);
}

function moveRight() {
    leftArrow.off("click", moveLeft);
    rightArrow.off("click", moveRight);

    const first = $(".carousel-image-card").first();
    const current = first.next();

    slideBox.animate({ left: "-54vw" }, 1000, "linear");
    setTimeout(() => {
        first.appendTo(slideBox);
        slideBox.animate({ left: "-27vw" }, 0);
        leftArrow.on("click", moveLeft);
        rightArrow.on("click", moveRight);
    }, 1000);
}

leftArrow.on("click", moveLeft);
rightArrow.on("click", moveRight);
