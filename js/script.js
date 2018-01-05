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
        /*e.stopPropagation();
        e.preventDefault();*/
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
        /*$(".div-folder").css("display", "none");
        $("[data-x='filemanager']").css("display", "block");*/
    });
    }
);
function test($test) {
    $(".div-folder").css("display", "none");
    //$(".test").html("active-folder");
    //$("[data-x='$test']").css("display", "block");
}
test();
