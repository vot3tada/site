<?php
    require("header.php");
    require("autosingup.php");
    if(isset($_SESSION['login']))
    {
        require("add.php");
        require("getcards.php");
    }
?>


<?php
    require("footer.php");
?>