<?php
    session_start();
    require("db.php");
    $_POST['name'] = str_replace('<', '&#60;',$_POST['name']);
    $_POST['name'] = str_replace('>', '&#62;',$_POST['name']);
    $_POST['description'] = str_replace('<', '&#60;',$_POST['description']);
    $_POST['description'] = str_replace('>', '&#62;',$_POST['description']);
    $_POST['description'] = str_replace('"', '&#34;',$_POST['description']);
    $query = "INSERT INTO `exercises` (`id`, `user`, `name`, `description`, `stage`) VALUES (NULL, :login, :name, :description, 0);";
    $params = [
        ':login' => $_SESSION['login'],
        ':name' => $_POST['name'],
        ':description' => $_POST['description']
    ];
    $stmt = $db->prepare($query);
    $stmt->execute($params);
    require("getcards.php");
?>
