<?php
    require("header.php");
?>
<div class="cover-container w-100 h-100 p-3 mx-auto flex-column">
<h1 class="text-center text-primary">Веб-технологии</h1>
<main class="px-3 abober"> 
    
    <form action="reg.php" method="post">
    <div class="aboba form-group p-5">
    <input type="text" required placeholder="Логин" id="login" class="form-control mb-2 mr-sm-2">
    <input type="password" required placeholder="Пароль" id="password" class="form-control mb-2 mr-sm-2">
    <button type="submit" class="btn btn-primary mb-2">Регистрация</button>
    </div>
    </form>
    </main>

    </div>
    

<?php
    require("footer.php");
?>