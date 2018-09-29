// SLIDE TIMELINE
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

// CONTEXT MENU

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

$("#logout").click(function() {
    window.location.href = "../php files/logout.php";
})

$("#button-logout").click(function() {
    window.location.href = "../php files/logout.php";
})

$("#newTask").click(function() {
    $("#dashboard__taskadd").css("display", "flex")
    $("#dashboard__taskadd").css("opacity", "1")
    $("#black-bg").css("display", "block")
})

//TASK ADD 

$("#task-add").click(function() {

    $("#dashboard__taskadd").css("display", "flex")
    $("#dashboard__taskadd").css("opacity", "1")
    $("#black-bg").css("display", "block")

})

$("#taskadd__back").click(function() {
    $("#dashboard__taskadd").animate({ opacity: 0 }, "300");
    setTimeout(function() {
        $("#black-bg").css({ display: 'none' });
        $("#dashboard__taskadd").css({ display: 'none' });
    }, 350)
})

const $inputs = document.getElementsByClassName('input');
for (let inputIndex = $inputs.length - 1; inputIndex >= 0; inputIndex--) {
    const $input = $inputs[inputIndex];
    // ...
}
const $checkboxes = document.getElementsByClassName('input--checkbox');
for (let checkboxIndex = $checkboxes.length - 1; checkboxIndex >= 0; checkboxIndex--) {
    const $checkbox = $checkboxes[checkboxIndex];
    // ...
}
setTimeout(() => { /* TODO: prevent this timeout */
    const $preloadElements = document.getElementsByClassName('preload');
    for (let preloadIndex = $preloadElements.length - 1; preloadIndex >= 0; preloadIndex--) {
        const $preload = $preloadElements[preloadIndex];
        $preload.classList.remove('preload');
    }
}, 500);

var cleave = new Cleave('.js-date', {
    date: true,
    datePattern: ['d', 'm', 'Y']
})