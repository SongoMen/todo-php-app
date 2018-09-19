Number.prototype.roundTo = function(nTo) {
    nTo = nTo || 10;
    return Math.round(this * (1 / nTo)) * nTo;
}

$(function() {
    var slides = $('#dashboard__timeline').children().length;
    var slideWidth = 800;
    var min = 0;
    var max = -((slides - 1) * slideWidth);

    $("#dashboard__timeline").width(slides * slideWidth).draggable({
        axis: 'x',
        drag: function(event, ui) {
            if (ui.position.left > min) ui.position.left = min;
            if (ui.position.left < max) ui.position.left = max;
        },
        stop: function(event, ui) {
            $(this).animate({ 'left': (ui.position.left).roundTo(slideWidth) })
        },
        cursor: 'pointer'
    });
});



if (document.addEventListener) {
    document.addEventListener('contextmenu', function(e) {
        $(".context")
            .show()
            .css({
                top: event.pageY,
                left: event.pageX
            });
        e.preventDefault();
    }, false);
} else {
    document.attachEvent('oncontextmenu', function() {
        $(".context")
            .show()
            .css({
                top: event.pageY,
                left: event.pageX
            });
        window.event.returnValue = false;
    });
}

$(document).click(function() {
    if ($(".context").is(":hover") == false) {
        $(".context").fadeOut("fast");
    };
});

$("#task-add").click(function() {
    if ($('#dashboard__taskadd').css('display') === "none") {
        $("#dashboard__taskadd").css("display", "flex")
        $("#black-bg").css("display", "block")
    } else {
        $("#dashboard__taskadd").css("display", "none")
        $("#black-bg").css("display", "block")
    }
})