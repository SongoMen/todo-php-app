$("#username__box")

.focus(function() {
    $("#username__box").css("border-bottom", "solid 2px red")
    $("#username__label").css("color", "#f44242")
})

.focusout(function() {
    $("#username__box").css("border-bottom", "solid 1px #bdc3c7")
    $("#username__label").css("color", "#a7adb1")
})

$("#password__box")

.focus(function() {
    $("#password__box").css("border-bottom", "solid 2px red")
    $("#password__label").css("color", "#f44242")
})

.focusout(function() {
    $("#password__box").css("border-bottom", "solid 1px #bdc3c7")
    $("#password__label").css("color", "#a7adb1")
})

var bodyElement = document.querySelector("body");
bodyElement.addEventListener("mousemove", getMouseDirection, false);

var xDirection = "";
var yDirection = "";

var oldX = 0;
var oldY = 0;

function getMouseDirection(e) {
    //deal with the horizontal case
    if (oldX < e.pageX) {
        xDirection = "right";
    } else {
        xDirection = "left";
    }