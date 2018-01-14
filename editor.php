<?php
if(isset($_GET['file'])) {
    if (!empty($_GET['file'])) $param2 = $_GET['file'];
    else {
        $param2 = '';
    }
    if ($param2 == $_GET['file']) {

        if(isset($_POST['file-text'])){
            $str = $_POST['file-text'];
            if(isset($_POST['save-file'])){
                $strfile = file_put_contents("$param2", "$str\n");
            }
            $file = htmlspecialchars(file_get_contents("$param2"));
        }else {
            $file = htmlspecialchars(file_get_contents("$param2"));
        }
        echo
            "<form method=\"post\" class='form-file'>".
                "<textarea name=\"file-text\" id=\"file-text\" class=\"file-edit\">$file</textarea>".
                "<button type=\"submit\" name=\"save-file\" class='save'>Save file</button>".
            "</form>";
    }
}
?>
<script>
    /*$( function() {
        $( "#dialog" ).dialog();
        });*/
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
</script>
