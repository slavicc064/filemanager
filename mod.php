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

function echoDir($dir, $test = "./") {
    foreach ($dir as $key => $value) {
        if(is_array($value)){
            $x = count($value);
            if($x > 0) {
                echo "<li class=\"folder\">".
                    "<div class=\"click-folder\" tabindex=\"-1\" data-n=\"$test$key/\">".
                    "<img src='icon/folder-visiting.svg' alt='test' class='icon'>".
                    "<span class=\"text\">$key<span class=\"caret\" data-caret='1'></span></span>".
                    "</div><ul class=\"dropdown-none\">";
                echo echoDir($value, "$test$key/")."</ul></li>";
            }
            else {
                echo "<li class=\"folder\">".
                    "<div class=\"click-folder\" tabindex=\"-1\" data-n=\"$test$key/\">".
                    "<img src='icon/folder-visiting.svg' alt='test' class='icon'>".
                    "<span class=\"text\">$key</span>".
                    "</div>".
                    "</li>";
            }
        }
    }
}

function mime_test($filename) {

        $mime_types = array(

            'txt' => 'text/x-txt',
            'htm' => 'text/x-html',
            'html' => 'text/x-html',
            'php' => 'text/x-php',
            'css' => 'text/x-css',
            'js' => 'application/javascript',
            'json' => 'application/json',
            'xml' => 'application/xml',
            'swf' => 'application/x-shockwave-flash',
            'flv' => 'video/x-flv',
            'png' => 'image/png',
            'jpe' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'jpg' => 'image/jpeg',
            'gif' => 'image/gif',
            'bmp' => 'image/bmp',
            'ico' => 'image/vnd.microsoft.icon',
            'tiff' => 'image/tiff',
            'tif' => 'image/tiff',
            'svg' => 'image/svg+xml',
            'svgz' => 'image/svg+xml',
            'zip' => 'application/zip',
            'rar' => 'application/x-rar-compressed',
            'exe' => 'application/x-msdownload-exe',
            'msi' => 'application/x-msdownload-msi',
            'cab' => 'application/vnd.ms-cab-compressed',
            'mp3' => 'audio/mpeg-mp3',
            'qt' => 'video/quicktime-gt',
            'mov' => 'video/quicktime-moy',
            'pdf' => 'application/pdf',
            'psd' => 'image/vnd.adobe.photoshop-(psd)',
            'ai' => 'application/postscript-(ai)',
            'eps' => 'application/postscript-(eps)',
            'ps' => 'application/postscript',
            'doc' => 'application/msword',
            'rtf' => 'application/rtf',
            'xls' => 'application/vnd.ms-excel',
            'ppt' => 'application/vnd.ms-powerpoint',
            'odt' => 'application/vnd.oasis.opendocument.text',
            'ods' => 'application/vnd.oasis.opendocument.spreadsheet',
        );
        $ext = explode('.',$filename);
        $ext = strtolower(array_pop($ext));
        if (array_key_exists($ext, $mime_types)) {
            return $mime_types[$ext];
        }
        elseif (function_exists('finfo_open')) {
            $finfo = finfo_open(FILEINFO_MIME);
            $mimetype = finfo_file($finfo, $filename);
            finfo_close($finfo);
            return $mimetype;
        }
        else {
            return 'application/octet-stream';
        }
    }

function rscandir2($dir='') {

    $arrDir = scandir($dir);

    foreach($arrDir as $value) {

        if (!in_array($value,array(".",".."))) {
            if (is_dir($dir . $value)) {
                $kind = 'folder';
                echo "<tr class='tr-folder' data-dir='$dir$value/'>".
                        "<td class=\"name\">".
                            "<div class='get-link'>".
                                "<img src='icon/folder-visiting.svg' alt='test' class='icon icon-r'>".
                                "<span>". $value. "</span>".
                            "</div>".
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
                $kind = mime_test("$dir" . "$value");
                if($kind == "text/x-php"){
                    $img = 'icon/application-x-php.svg';
                }
                elseif($kind == "text/x-css"){
                    $img = "icon/text-x-css.svg";
                }
				elseif($kind == "application/javascript"){
                    $img = "icon/application-javascript.svg";
                }
                elseif($kind == "image/png"){
                    $img = "icon/application-image-png.svg";
                }
                elseif($kind == "image/jpeg"){
                    $img = "icon/application-image-jpg.svg";
                }
				elseif($kind == "image/svg+xml"){
                    $img = "icon/application-image-jpg.svg";
                }
                else {
                    $img = 'icon/application-document.svg';
                }
                echo "<tr class='tr-folder' data-file='$dir$value'>".
                        "<td class=\"name\">".
                            "<div data-modal='$dir$value' class='opener'>".
                                "<img src='$img' alt='test' class='icon icon-r'>".
                                "<span>". $value. "</span>".
                            "</div>".
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

?>
