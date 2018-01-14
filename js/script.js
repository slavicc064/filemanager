"use strict";
$(document).ready(function() {
    $("#div1").load("table.php?test=./");

    $('.dropdown .click-folder').on("click", function(){
        $(this).next('ul').toggleClass("dropdown-none");
        $(this).next('ul').toggleClass("dropdown-block");
        $(".click-folder").removeClass("active-folder");
        $(this).addClass("active-folder");
        $(this).children("span").children("span").toggleClass("caret").toggleClass("caret-right");
        var dataN = $(this).attr("data-n");
        $("#div1").load("table.php?test="+dataN);
    });

});
/*$( function() {
    $( "#dialog" ).dialog();
} );*/
/*$( function() {
    $( "#dialog" ).dialog({
        autoOpen: true,
        show: {
            effect: "explode",
            duration: 1000,
        },
        hide: {
            effect: "explode",
            duration: 1000,
        }
    });
    $('.ui-dialog-titlebar-close').html("<span class=\"close close2\"><img src=\"icon/delete.svg\" alt=\"Close\"></span>");
	$('.ui-dialog').css("width", "700px");
    $('.contextmenu').css("display", "none");
    $( ".opener" ).contextmenu(function() {
        $('.contextmenu').css("display", "block");
    });
} );*/
