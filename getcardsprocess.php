<?php
    $stmt = $db->prepare("SELECT * FROM `exercises` WHERE `user` = ? AND `STAGE` = 1");
    $stmt->execute([$_SESSION['login']]);
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
      {
        require("getcardrow.php");
      }