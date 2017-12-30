<?php

function dirlist($dir, $param = "dirs") {

    $result = array();

    $cdir = scandir($dir);
        foreach ($cdir as $key => $value) {
            if (!in_array($value,array(".",".."))) {
                if ($param == "files") {
                    if (is_dir($dir . DIRECTORY_SEPARATOR . $value)) {
                        $result[$value] = dirlist($dir . DIRECTORY_SEPARATOR . $value, $param = "files");
                    } else {
                        $result[] = $value;
                    }
                }
                elseif ($param == "dirs") {
                    if (is_dir($dir . DIRECTORY_SEPARATOR . $value)) {
                        $result[$value] = dirlist($dir . DIRECTORY_SEPARATOR . $value, $param = "dirs");
                    }
                }
            }
        }

    return $result;

}

function echoDir($dir) {
    foreach ($dir as $key => $value) {
        if(is_array($value)){
            $x = count($value);
            if($x > 0) {
                echo "<li class=\"folder\">".
                     "<a class=\"click-folder\" tabindex=\"-1\" href=\"#\" name=\"$key\"'>".
                        "<img src='icon/folder-visiting.svg' alt='test' class='icon'>".
                        "<span class=\"text\">$key<span class=\"caret\" data-caret='1'></span></span>".
                     "</a><ul class=\"dropdown-none\">";
                echo echoDir($value)."</ul></li>";
            }
            else {
                echo "<li class=\"folder\">".
                         "<a class=\"click-folder\" tabindex=\"-1\" href=\"#\">".
                            "<img src='icon/folder-visiting.svg' alt='test' class='icon'>".
                            "<span class=\"text\">$key</span>".
                         "</a>".
                     "</li>";
            }
        }
    }
}

function echoFiles($dir) {

    foreach ($dir as $key => $value) {
        if(is_array($value)){
            echo "<div class='div-folder'><img src='icon/folder-visiting.svg' alt='test' class='icon'><span class=\"text\">$key</span></div>";
        }
    }

    foreach ($dir as $key => $value) {
        if(!is_array($value)){
            echo "<div class='div-folder'><img src='icon/application-document.svg' alt='test' class='icon'><span class=\"text\">$value</span></div>";
        }
    }

}

function dirToArray($dir) {

    $result = array();

    $cdir = scandir($dir);
    foreach ($cdir as $key => $value)
    {
        if (!in_array($value,array(".","..")))
        {
            if (is_dir($dir . DIRECTORY_SEPARATOR . $value))
            {
                $result[$value] = dirToArray($dir . DIRECTORY_SEPARATOR . $value);
            }
            else
            {
                $result[] = $value;
            }
        }
    }

    return $result;
}

function tableDir($dir){
    /*if ( !empty($_GET['page'])) $param = $_GET['page'];
    else {
        $param = './';
    }

    if ($param == $_GET['page']) {
        echoFiles(dirlist($param, "files"));
    tableDir(dirlist($param, "files"));
    }*/
    foreach ($dir as $key => $value) {
        if(is_array($value)){
            echo "<div class='div-folder'><img src='icon/folder-visiting.svg' alt='test' class='icon'><span class=\"text\">$key</span></div>";
            echo "<div class='none' data-x='$key'>";
            echo echoDir2($value);
            echo "</div>";
        }
    }

    foreach ($dir as $key => $value) {
        if(!is_array($value)){
            echo "<div class='div-folder'><img src='icon/application-document.svg' alt='test' class='icon'><span class=\"text\">$value</span></div>";
        }
    }
}


function echoDir2($dir) {
    foreach ($dir as $key => $value) {
        if(is_array($value)){
            echo "<div class='div-folder'><img src='icon/folder-visiting.svg' alt='test' class='icon'><span class=\"text\">$key</span></div>";
            echo "<div class='none' data-x='$key'>";
            echo echoDir2($value);
            echo "</div>";
        }
    }

    foreach ($dir as $key => $value) {
        if(!is_array($value)){
            echo "<div class='div-folder'><img src='icon/application-document.svg' alt='test' class='icon'><span class=\"text\">$value</span></div>";
        }
    }
}
?>