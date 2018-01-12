<?php

function rscandir($dir='', $result=array(), $par='./') {

    $arrDir = scandir($dir);
    foreach($arrDir as $key=> $value) {

        if (!in_array($value,array(".",".."))) {
            if (is_dir($dir . $value)) {
                echo "<li class=\"folder\">" .
                    "<a class=\"click-folder\" tabindex=\"-1\" href=\"index.php?test=$dir$value/\" data-n=\"$dir$value/\"'>" .
                    "<img src='icon/folder-visiting.svg' alt='test' class='icon'>" .
                    "<span class=\"text\">$value<span class=\"\" data-caret='1'></span></span>" .
                    "</a><ul class=\"dropdown-block\">";
                echo rscandir($dir . $value . '/', $result) . "</ul></li>";
                /*$result[] = $dir . $value . '/';
                rscandir($dir . $value . '/', $result);*/
            }
        }
    }
}
function rscandir2($dir='') {

    $arrDir = scandir($dir);

    foreach($arrDir as $value) {

        if (!in_array($value,array(".",".."))) {
            if (is_dir($dir . $value)) {
                $kind = 'folder';
                echo "<tr class='tr-folder'>".
                        "<td class=\"name\">".
                            "<a href='index.php?test=$dir$value/' class='get-link'>".
                                "<img src='icon/folder-visiting.svg' alt='test' class='icon icon-r'>".
                                "<span>". $value. "</span>".
                            "</a>".
                        "</td>".
                        "<td class='size'>".
                            '-' .
                        "</td>".
                        "<td class='kind'>".
                            $kind .
                        "</td>".
                    "</tr>";
            }
        }

    }
    foreach($arrDir as $value) {

        if (!in_array($value,array(".",".."))) {
            if (is_file($dir . $value)) {
                $size = filesize("$dir" . "$value").'b';
                $kind = mime_content_type ("$dir" . "$value");
                if($kind == "text/x-php"){
                    $img = 'icon/application-x-php.svg';
                }
                elseif($kind == "text/x-asm"){
                    $img = "icon/text-x-css.svg";
                }
                elseif($kind == "image/png"){
                    $img = "icon/application-image-png.svg";
                }
                elseif($kind == "image/jpeg"){
                    $img = "icon/application-image-jpg.svg";
                }
                else {
                    $img = 'icon/application-document.svg';
                }
                echo "<tr class='tr-folder'>".
                        "<td class=\"name\">".
                            "<a href='index.php?file=$dir$value' data-modal='$dir$value' class='opener'>".
                                "<img src='$img' alt='test' class='icon icon-r'>".
                                "<span>". $value. "</span>".
                            "</a>".
                        "</td>".
                        "<td class='size'>".
                            $size .
                        "</td>".
                        "<td class='kind'>".
                            $kind .
                        "</td>".
                    "</tr>";
            }
        }

    }

}
function getpar($get) {
    if ( !empty($get)) $param = $get;
    else {
        $param = './';
    }
    if ($param == $get) {
        echo "<script>".
            "$(document).ready(function(){\n".
                "\t$(\"[data-n]\").removeClass(\"active-folder\");\n".
                "\t$(\"[data-n = '$get']\").addClass(\"active-folder\");\n".
                "});".
            "</script>";
    }}

?>
