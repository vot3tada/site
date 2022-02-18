<?php
    require("header.php");
    require("autosingup.php");
?>
<div class="cards">
    <div class="cardplace">
        <div class="alert alert-primary">Задания</div>
        <?php
            if(isset($_SESSION['login']))
            {
                require("add.php");
                require("getcards.php");
            }
        ?>
    </div>
    <div class="cardplace">
    <div class="alert alert-primary">В процессе</div>
    <?php
            if(isset($_SESSION['login']))
            {
                require("getcardsprocess.php");
            }
        ?>
    </div>
    <div class="cardplace">
    <div class="alert alert-primary">Готово</div>
    <?php
            if(isset($_SESSION['login']))
            {
                require("getcardsend.php");
            }
        ?>
    </div>
</div>
<?php
    require("footer.php");
?>