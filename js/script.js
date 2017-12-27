/**
 * Created by user on 24.12.2017.
 */
$(document).ready(function(){
    $(".file-manager-window").click(function(){
        $(".file-manager-window").css("background-color","red");
    });


    $('.dropdown .click-folder').on("click", function(e){
        $(this).next('ul').toggleClass("dropdown-none");
        $(this).next('ul').toggleClass("dropdown-block");
        e.stopPropagation();
        e.preventDefault();
        $(".click-folder").removeClass("active-folder");
        $(this).addClass("active-folder");
        $(".dropdown-block").prev("a").children("span").children("span").removeClass("caret");
        $(".dropdown-block").prev("a").children("span").children("span").addClass("caret-right");
        $(".dropdown-none").prev("a").children("span").children("span").removeClass("caret-right");
        $(".dropdown-none").prev("a").children("span").children("span").addClass("caret");
        $(".fm-box-right").on(click, test());
    });
    }
);