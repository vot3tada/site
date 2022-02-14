<?php
    require("header.php");
?>

<div class="abober1">
    <div class="card">
        <img class="card-img-top" src="https://i.ytimg.com/vi/8zpIUq9EqoM/maxresdefault.jpg" alt="">
        <div class="card-body">
            <?php 
             if(isset($_SESSION['login']))
             {
                print("<h4 class='card-title text-primary'>Привет, ".$_SESSION['login']."!</h4>");
             }
            ?>
            <p class="text-secondary">Тут пока пусто...</p>
        </div>
    </div>
</div>

<?php
    require("footer.php");
?>