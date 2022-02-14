<?php
    session_start();
    if (isset($_SESSION["login"]) && isset($_SESSION["password"]))
    {
        $stmt = $db->prepare("SELECT * FROM `users` WHERE `login` = ? AND `password` = ?");
        $stmt->execute([$_SESSION["login"],$_SESSION["password"]]);
        $category = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($category != null)
        {
            header("Location: main.php");
        }
    }
?>