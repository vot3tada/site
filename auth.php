<?php
    require("header.php");
?>

<form action="reg.php" method="post">
    <input type="text" required placeholder="Логин">
    <input type="password" required placeholder="Пароль">
    <button type="submit">Войти</button>
    </form>

<?php
    require("footer.php");
?>