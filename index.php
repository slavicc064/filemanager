<?php include "mod.php"?>
<?php
$dir = "../filemanager";
$scandir = dirToArray($dir);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> File Manager</title>
    <link rel="stylesheet" href="css/style.css"/>
    <!--<link rel="stylesheet" href="css/jquery-ui.min.css">-->
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
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
                        <a class="click-folder" href="#" tabindex="-1"><img src="icon/user-home.svg" alt="Manager icon"><span>filemanager</span></a>
                        <ul class="dropdown-menu"><?php echoDir($scandir);?></ul>
                    </li>
                </ul>
            </div>
            <div class="fm-box-right"></div>
        </div>
        <div class="fm-bottom">

        </div>
    </div>


    <?php
        /*echo '<pre>';
        print_r($scandir);

        echo '</pre>';

        echoDir($scandir);*/
    ?>
</body>
</html>