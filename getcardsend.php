<?php
session_start();
require("db.php");
    $stmt = $db->prepare("SELECT * FROM `exercises` WHERE `user` = ? AND `STAGE` = 2");
    $stmt->execute([$_SESSION['login']]);
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
      {
        var_dump((string)$row['id']);
    var_dump($row['name']);
    var_dump($row['description']);
      }