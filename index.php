<?php //session_start();?>
<?php include "header.php"?>
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
                        <div class="click-folder active-folder" tabindex="-1" data-n="./"><img src="icon/user-home.svg" alt="Manager icon" class="icon"><span class="text">filemanager<span class="caret" data-caret='1'></span></span></div>
                        <ul class="dropdown-none"><?php echoDir(dirlist('./'), "./");?></ul>
                    </li>
                </ul>
            </div>
			<!--<div class="fm-box-right">
			<table class='table-r'>
				<tr class="title-folder">
					<td><span>Name</span></td>
					<td class="size"><span>Size</span></td>
					<td class="kind"><span>Kind</span></td>
				</tr>
			<?php
/*			if(isset($_GET['test'])) {
				if (!empty($_GET['test'])) $param = $_GET['test'];
				else {
					$param = '../';
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
			*/?>
			</table>
			</div>-->
            <div class="fm-box-right" id="div1"></div>
        </div>
        <div class="fm-bottom">

        </div>
    </div>

<div id="dialog" title="Text Editor: test">

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

        /*if(isset($_GET['test'])) {
            getpar($_GET['test']);
        }
        else {
            getpar('./');
        }*/

    ?>
    <!--<script>
        $(".click-folder").click(function(){
            $testpx = $(this).attr("data-n");
            alert($testpx);
            $("#div1").load("table.php?test="+$testpx);
        });

    </script>-->
</body>
</html>




