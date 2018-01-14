"use strict";
$(document).ready(function() {
    $('.tr-folder').dblclick(function(){
        $.fn.hasAttr = function(name) {
            return this.attr(name) !== undefined;
        };
        var dataDir = $(this).attr("data-dir");
        var dataFile = $(this).attr("data-file");
        if($(this).hasAttr('data-dir')) {
            $("[data-n='"+dataDir+"']")[0].click();
            $("[data-n='"+dataDir+"']").next('ul').removeClass("dropdown-none").addClass("dropdown-block");
            $("[data-n='"+dataDir+"']").children("span").children("span").removeClass("caret").addClass("caret-right");
            $("[data-n='"+dataDir+"']").parent("li").parent("ul").removeClass("dropdown-none").addClass("dropdown-block");
            $("[data-n='"+dataDir+"']").parent("li").parent("ul").prev("div").children("span").children("span").removeClass("caret").addClass("caret-right");
            //alert('true');
        } else if ($(this).hasAttr('data-file')) {
            $("#dialog").load("editor.php?file="+dataFile);
            $( "#dialog" ).dialog({
                autoOpen: true,
                hide: {
                    effect: "explode",
                    duration: 1000
                }
            });
            var w = window.innerWidth*0.5;
            var h = window.innerHeight*0.9;
            $(".ui-dialog").css({"width": w, "height": h, "top": "30px", "left": "20%", "overflow": "scroll"});
            $("#dialog").css({"height": "87%"});
            $(".ui-dialog").hide();

            $(".ui-dialog").show( "explode", 1000 );
            //alert('false');
        }
        else {
            alert(error);
        }
    });
    $('.tr-folder').click(function(){
        $(".tr-folder").removeClass("active-folder");
        $(this).addClass("active-folder");
    });


});