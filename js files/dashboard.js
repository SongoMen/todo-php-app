add = 0;
// CONTEXT MENU

/*if (document.addEventListener) {
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
*/
//TASK ADD 

$("#task-add").click(function() {
    if(add === 0){
        add = 1
        $(".column-text").remove()
        $( ".dashboard__todo" ).append( "<div class='dashboard__addTask'><input type='text' class='name' placeholder='Type task name here'><textarea class='description' placeholder='If you want, type description here'></textarea><div style='display:flex;justify-content:center;flex-direction:column'><svg class='dashboard__remove'><circle cx='30' cy='30' r='30'/></svg><svg class='dashboard__add'><circle cx='30' cy='30' r='30'/></svg></div></div>" );
    }
})

$("#taskadd__back").click(function() {
    $("#dashboard__taskadd").animate({ opacity: 0 }, "300");
    setTimeout(function() {
        $("#black-bg").css({ display: 'none' });
        $("#dashboard__taskadd").css({ display: 'none' });
    }, 350)
})
