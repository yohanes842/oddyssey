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

//live search
$("#search")?.on("focus", function () {
    $("#dark-screen").css("display", "block");
    $("#search-list").css("display", "block");
});
$("#dark-screen")?.on("click", function () {
    $("#dark-screen").css("display", "none");
    $("#search-list").css("display", "none");
});

function ajaxRequest(keyword) {
    $.ajax({
        url: "live-search",
        type: "GET",
        data: { keyword: keyword },
        success: function (data) {
            $("#search-list").empty();

            data.forEach((each) => {
                console.log(each);
                var price = each.price
                    ? "IDR " + each.price.toLocaleString("id-ID")
                    : "FREE";
                $("#search-list").append(
                    $("<a>", {
                        href: "/game/" + each.slug,
                    }).append(
                        $("<div>", {
                            class: "h-16 p-1 pr-3 flex flex-row items-center justify-between bg-white border-x-2 border-y-[1px] hover:border-4 hover:border-[#c7ccf7]",
                        }).append([
                            $("<div>", {
                                class: "h-full flex flex-row items-center gap-5",
                            }).append([
                                $("<img>", {
                                    class: "h-full w-28 flex flex-row items-center gap-5",
                                    src:
                                        "assets/" +
                                        each.image_path +
                                        each.thumbnail_filename,
                                }),
                                $("<h3>").text(each.title),
                            ]),
                            $("<h3>").text(price),
                        ])
                    )
                );
            });
        },
    });
}

//Optimization live search feature
let requestTimeout = "";

$(document).ready(function () {
    $("#search").on("keyup", (e) => {
        clearTimeout(requestTimeout);
        requestTimeout = setTimeout(() => {
            ajaxRequest(e.target.value);
        }, 300);
    });
});
