$(document).ready(function() {
    /*$("[data-x='filemanager']").css("display", "block");

    $('.dropdown .click-folder').on("click", function(){
        $(this).next('ul').toggleClass("dropdown-none");
        $(this).next('ul').toggleClass("dropdown-block");
        $(".click-folder").removeClass("active-folder");
        $(this).addClass("active-folder");
        $(".dropdown-block").prev("a").children("span").children("span").removeClass("caret").addClass("caret-right");
        $(".dropdown-none").prev("a").children("span").children("span").removeClass("caret-right").addClass("caret");
        $p = $(this).text();
        $(".test").html("" +
            "<script>" +
            "function test() {\n" +
            "    $(\"[data-x]\").css(\"display\", \"none\");\n" +
            "    $(\"[data-x=\'" + $p + "\']\").css(\"display\", \"block\");\n" +
            "}" +
            "test();" +
            "</script>" +
            "");
    });
    $('.div-folder').on("click", function () {
        $p = $(this).text();
        $(".test").html(
            "<script>" +
            "function test() {\n" +
            "    $(\"[data-x]\").css(\"display\", \"none\");\n" +
            "    $(\"[data-x=\'" + $p + "\']\").css(\"display\", \"block\");\n" +
            "}" +
            "test();" +
            "</script>"
        );
    })*/


});
/*$( function() {
    $( "#dialog" ).dialog();
} );*/
$( function() {
    $( "#dialog" ).dialog({
        /*autoOpen: true,
        show: {
            effect: "blind",
            duration: 1000,
        },
        hide: {
            effect: "explode",
            duration: 1000,
        }*/
    }).show();
    $('.ui-dialog-titlebar-close').html("<span class=\"close close2\"><img src=\"icon/delete.svg\" alt=\"Close\"></span>");
    $('.contextmenu').css("display", "none");
    $( ".opener" ).contextmenu(function() {
        $('.contextmenu').css("display", "block");
    });
} );
