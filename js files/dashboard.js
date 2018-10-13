var add = 0;

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
    if(add === 0){
        noti = $(".column-text").remove();
        add = 1
        $( ".addTask" ).append( "<div class='dashboard__addTask'><input type='text' class='name' placeholder='Type task name here'><textarea class='description' placeholder='If you want, type description here'></textarea><div style='display:flex;justify-content:center;flex-direction:column'><div class='circle__add'><svg fill='white' xmlns='http://www.w3.org/2000/svg' width='30' height='30' viewBox='0 0 24 24'><path d='M24 10h-10v-10h-4v10h-10v4h10v10h4v-10h10z'/></svg></div><div class='circle__remove'><svg fill = 'white' xmlns='http://www.w3.org/2000/svg' width='15' height='15' viewBox='0 0 24 24'><path d='M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z'/></svg></div></div></div>" );
    }
    else if(add ===1){
        add = 0
        $(".dashboard__todo").append( noti ); // later
        $(".dashboard__addTask").remove()
    }
})
*/

$("#task-add").click(function() {
    if(add === 0){
        noti = $(".column-text").remove();
        add = 1
        $( ".addTask" ).append( "<div class='dashboard__addTask'><input type='text' class='name' placeholder='Type task name here'><textarea class='description' placeholder='If you want, type description here'></textarea><div style='display:flex;justify-content:center;flex-direction:column'><div class='circle__add'><svg fill='white' xmlns='http://www.w3.org/2000/svg' width='30' height='30' viewBox='0 0 24 24'><path d='M24 10h-10v-10h-4v10h-10v4h10v10h4v-10h10z'/></svg></div><div class='circle__remove'><svg fill = 'white' xmlns='http://www.w3.org/2000/svg' width='15' height='15' viewBox='0 0 24 24'><path d='M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z'/></svg></div></div></div>" );
    }
    else if(add ===1){
        add = 0
        $(".dashboard__todo").append( noti );
        $(".dashboard__addTask").remove()
    }
})

//COMPLETE TASK

$(".table__items").click(function(event){
    if(document.getElementById( event.target.id).checked === true){
        $('span.'+event.target.id).addClass("strikeout")
        $('span.'+event.target.id).css({width: "550px"})
        $('.'+event.target.id).css({color: "#7f8489"})
        $.ajax({
            type:"POST",
            url:"send.php",
            data: {klucz_ajax:1, Task:event.target.id},
                success:function() {
                    console.log("sent"); 
                },

                error: function(blad) {
                    alert( "Wystąpił błąd");
                    console.log(blad); 
                }
        });
    }
    else{
        $('.'+event.target.id).css({color: "white"})
        $('span.'+event.target.id).css({width: "0"})
        $.ajax({
            type:"POST",
            url:"send.php", 
            data: {klucz_ajax:0, Task:event.target.id}, 
                success:function() {
                    console.log("sent"); 
                },

                error: function(error) {
                    alert( "Wystąpił błąd");
                    console.log(error);
                }
        });
        setTimeout(() => {
            $('.'+event.target.id).removeClass("strikeout")
        }, 1000);
    };
})

//ADD TASK

    $(".addTask").on('click', '.circle__add', function(){
        nam = $(".name").val()
        desc = $(".name").html()
        if(nam !== ""){
            $.ajax({
                type:"POST",
                url:"addTask.php",
                data:{Task:nam,Description:desc,Done:0},
                    success:function(){
                        console.log("XD")
                        window.location.reload()
                    },
                    error:function(error){
                        console.log(error)
                    }
            })
        }
        
    
    })

    //add scroll
    if($('.tasks').visible( false, true) == false){
        $(".tasks").css({'overflow-y':'scroll', 'height': '100%' })
    }
    if($('.tasks2').visible( false, true) == false){
        $(".tasks2").css({'overflow-y':'scroll', 'height': '100%' })
    }