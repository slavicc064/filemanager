<?php include "mod.php"?>
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
            $param = '../';
        }
        if ($param == $_GET['test']) {
            if(is_dir($param)){
                rscandir2("$param");
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
<script src="js/table.js"></script>