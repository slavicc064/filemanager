<?php include "mod.php"?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> File Manager</title>
    <!--<link rel="stylesheet" href="css/jquery-ui.min.css">-->
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="css/style.css"/>
    <script src="js/jquery-2.2.4.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
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
                        <a class="click-folder filemanager active-folder" href="#" name="filemanager" tabindex="-1"><img src="icon/user-home.svg" alt="Manager icon" class="icon"><span class="text">filemanager<span class="caret-right" data-caret='1'></span></span></a>
                        <ul class="dropdown-block"><?php echoDir(dirlist("./"));?></ul>
                    </li>
                </ul>
            </div>
            <div class="fm-box-right">
                <?php

                //echoFiles(dirlist("./", "files"));
                tableDir(dirlist("./", "files"));
                //tableDir(dirToArray("./"));
                //echoDir2(dirToArray("./"));
                ?>
            </div>
        </div>
        <div class="fm-bottom">

        </div>
    </div>

    <ul class="">
        <li class="focus">
            <a class="click-folder" href="#" name="test" tabindex="-1"><img src="icon/user-home.svg" alt="Manager icon" class="icon"><span class="text">filemanager<span class="caret" data-caret='1'></span></span></a>
            <ul class="dropdown-none"><?php echoDir(dirlist("./"));?></ul>
        </li>
    </ul>

</body>
</html>