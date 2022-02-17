<?php
    require("header.php");
    $l = "";
    require("autosingup.php");
    if (isset($_REQUEST['sub']))
    {
        $login = $_REQUEST['login'];
        $password = $_REQUEST['password'];
        $stmt = $db->prepare("SELECT * FROM `users` WHERE `login` = ?");
        $stmt->execute([$login]);
        $category = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($category != null)
        {
            $_SESSION["login"] = $_REQUEST['login'];
            $_SESSION["password"] = $_REQUEST['password'];
            header("Location: main.php");
        }
        else
        {
            $l = "Неправильный логин или пароль";
        }
    }
?>
    <div class="cover-container w-100 h-100 p-3 mx-auto flex-column">
    <main class="px-3 abober"> 
    <form action="auth.php" method="POST">
    <div class="aboba form-group p-5">
    <input type="text" required placeholder="Логин" name="login" class="form-control mb-2 mr-sm-2">
    <input type="password" required placeholder="Пароль" name="password" class="form-control mb-2 mr-sm-2">
    <button type="submit" name="sub" class="btn btn-primary mb-2">Вход</button>
    <a href="reg.php">Регистрация</a>
    <?php
        print("<p class='text-primary'>".$l."</p>");
    ?>
    </div>
    </form>
    </main>
    </div>
<?php
    require("footer.php");
?>