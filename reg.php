<?php
    require("header.php");
    $l = "";
    require("db.php");
    require("autosingup.php");
    if (isset($_REQUEST['sub']))
    {
        $login = $_REQUEST['login'];
        $password = $_REQUEST['password'];


        $stmt = $db->prepare("SELECT * FROM `users` WHERE `login` = ?");
        $stmt->execute([$login]);
        $category = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($category == null)
        {
            $query = "INSERT INTO `users` (`login`, `password`) VALUES (:login, :password);";
            $params = [
                ':login' => $login,
                ':password' => $password
            ];
            $stmt = $db->prepare($query);
            $stmt->execute($params);
            $_SESSION['login']=$login;
            $_SESSION['password']=$password;
        }
        else
        {
            $l = "Этот логин занят";
        }
    }
?>
    <div class="cover-container w-100 h-100 p-3 mx-auto flex-column">
<main class="px-3 abober"> 
    <form action="reg.php" method="POST">
    <div class="aboba form-group p-5">
    <input type="text" required placeholder="Логин" name="login" class="form-control mb-2 mr-sm-2">
    <input type="password" required placeholder="Пароль" name="password" class="form-control mb-2 mr-sm-2">
    <button type="submit" name="sub" class="btn btn-primary mb-2">Регистрация</button>
    <a href="auth.php">Вход</a>
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