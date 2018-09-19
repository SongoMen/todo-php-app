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
