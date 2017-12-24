/**
 * Created by user on 24.12.2017.
 */
$(document).ready(function(){
    $(".file-manager-window").click(function(){
        $(".file-manager-window").css("background-color","red");
    });


    $('.dropdown .click-folder').on("click", function(e){
        $(this).next('ul').toggle();
        e.stopPropagation();
        e.preventDefault();
    });
});