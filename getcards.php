<?php
      if(isset($_REQUEST['delete']))
      {
        $stmt = $db->prepare("DELETE FROM `exercises` WHERE `id` = ?");
        $stmt->execute([$_REQUEST['delete']]);
        header("Location:main.php");
      }
      if(isset($_REQUEST['edit']))
      {
        $stmt = $db->prepare("UPDATE `exercises` SET `description` = ? WHERE `id` = ?");
        $stmt->execute([$_REQUEST['description'],$_REQUEST['edit']]);
        header("Location:main.php");
      }
      if(isset($_REQUEST['left']))
      {
        $stmt = $db->prepare("SELECT * from `exercises` WHERE `id` = ?");
        $stmt->execute([$_REQUEST['left']]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $S = ($row['stage']);
        if ($S >= 1)
        {
          $S = $S - 1;
        }
        $stmt = $db->prepare("UPDATE `exercises` SET `stage` = ? WHERE `id` = ?");
        $stmt->execute([$S,$_REQUEST['left']]);
        header("Location:main.php");
      }
      if(isset($_REQUEST['right']))
      {
        $stmt = $db->prepare("SELECT * from `exercises` WHERE `id` = ?");
        $stmt->execute([$_REQUEST['right']]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $S = ($row['stage']);
        if ($S <= 1)
        {
          $S = $S + 1;
        }
        $stmt = $db->prepare("UPDATE `exercises` SET `stage` = ? WHERE `id` = ?");
        $stmt->execute([$S,$_REQUEST['right']]);
        header("Location:main.php");
      }
      
      $stmt = $db->prepare("SELECT * FROM `exercises` WHERE `user` = ? AND `STAGE` = 0");
      $stmt->execute([$_SESSION['login']]);
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
      {
        require("getcardrow.php");
      }

      ?>
