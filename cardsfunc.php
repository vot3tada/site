<?php
      session_start();
      require("db.php");
      if($_POST['method'] == "delete")
      {
        $stmt = $db->prepare("DELETE FROM `exercises` WHERE `id` = ?");
        $stmt->execute([$_POST['id']]);
        //header("Location:main.php");
      }
      if($_POST['method'] == "edit")
      {
        $_POST['description'] = str_replace('<', '&#60;',$_POST['description']);
        $_POST['description'] = str_replace('>', '&#62;',$_POST['description']);
        $stmt = $db->prepare("UPDATE `exercises` SET `description` = ? WHERE `id` = ?");
        $stmt->execute([$_POST['description'],$_POST['id']]);
        //header("Location:main.php");
      }
      if($_POST['method'] == "left")
      {
        $stmt = $db->prepare("SELECT * from `exercises` WHERE `id` = ?");
        $stmt->execute([$_POST['id']]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $S = ($row['stage']);
        if ($S >= 1)
        {
          $S = $S - 1;
        }
        $stmt = $db->prepare("UPDATE `exercises` SET `stage` = ? WHERE `id` = ?");
        $stmt->execute([$S,$_POST['id']]);
        //header("Location:main.php");
      }
      if($_POST['method'] == "right")
      {
        $stmt = $db->prepare("SELECT * from `exercises` WHERE `id` = ?");
        $stmt->execute([$_POST['id']]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $S = ($row['stage']);
        if ($S <= 1)
        {
          $S = $S + 1;
        }
        $stmt = $db->prepare("UPDATE `exercises` SET `stage` = ? WHERE `id` = ?");
        $stmt->execute([$S,$_POST['id']]);
        //header("Location:main.php");
      }
      

