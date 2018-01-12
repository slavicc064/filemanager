<?php //session_start();?>
<?php include "mod.php"?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> File Manager</title>
    <!--<link rel="stylesheet" href="css/jquery-ui.min.css">-->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="css/style.css"/>
    <script src="js/jquery-2.2.4.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
</head>
<body>
    <div class="fm-window">
        <div class="fm-top">
            <p class="title">File Manager</p>
            <span class="close"><img src="icon/delete.svg" alt="Close"></span>
        </div>
        <div class="fm-box">
            <div class="fm-box-left">
                <ul class="dropdown">
                    <li class="focus">
                        <a href="index.php?test=./" class="click-folder" name="./" tabindex="-1" data-n="./"><img src="icon/user-home.svg" alt="Manager icon" class="icon"><span class="text">filemanager<span class="caret-right" data-caret='1'></span></span></a>
                        <ul class="dropdown-block"><?php /*echoDir(dirlist('./'), "./");*/ rscandir("./");?></ul>
                    </li>
                </ul>
            </div>
            <div class="fm-box-right">
                <table class='table-r'>
                    <tr class="title-folder">
                        <td><span>Name</span></td>
                        <td class="size"><span>Size</span></td>
                        <td class="kind"><span>Kind</span></td>
                    </tr>
                <?php
                if(isset($_GET['test'])) {
                    if (!empty($_GET['test'])) $param = $_GET['test'];
                    else {
                        $param = './';
                    }
                    if ($param == $_GET['test']) {
                        if(is_dir($param)){
                            rscandir2("$param");
                        }
                        else {
                            echo "<script>".

                                "</script>";
                        }

                    } else {
                        rscandir2("./");
                    }
                }
                else {
                    rscandir2("./");
                }
                ?>
                </table>
            </div>
        </div>
        <div class="fm-bottom">

        </div>
    </div>


<div class="test">
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
                "<div id=\"dialog\" title=\"Text Editor: $param2\">
                    <form method=\"post\" >
                        <textarea name=\"file-text\" id=\"file-text\" class=\"file-edit\">$file</textarea>
                        <button type=\"submit\" name=\"save-file\" class='save'>Save file</button>
                    </form>
                </div>";
        }
    }
    ?>
</div>
    <?php

        if(isset($_GET['test'])) {
            getpar($_GET['test']);
        }
        else {
            getpar('./');
        }

    ?>
</body>
</html>


