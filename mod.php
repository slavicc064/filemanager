<?php
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

function echoDir($dir)
{
    $i = 0;
    foreach ($dir as $key => $value)
    {
        if (is_array($value))
        {
            $i++;
            echo "<li class=\"folder\">"."<a class=\"click-folder\" tabindex=\"-1\" href=\"#\"><img src='icon/folder-visiting.svg' alt='test'><span>$key</span> <span class=\"caret\"></span></a>"."<ul class=\"dropdown-menu\">";
            echo echoDir($value)."</ul>"."</li>";
        }
        else
        {
            echo "<li class=\"file\"><a tabindex=\"-1\" href=\"#\"><img src='icon/application-document.svg' alt='test'><span>$value</span></a></li>";
        }

    }
}
?>