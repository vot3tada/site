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
        print("<form action='main.php' method='POST'>
        <div class='card cardab'>
        <div class='card-header' style='display: inline-flex;justify-content: space-between;'>
            <h4 class='text-primary'>".$row['name']."</h4>
            <div>
            <button type='submit' name='edit' value='".$row['id']."' class='btn btn-warning'>Edit</button>
            <button type='submit' name='delete' value='".$row['id']."' class='btn btn-danger'>X</button>
            </div>
        </div>
        <div class='card-body'>
            <textarea name='description' cols='40' rows='10' style='resize: none;' class='text-secondary form-control'>".$row['description']."</textarea>
            <div style='display: grid;grid-auto-flow: column;'>
            <button type='submit' name='left' value='".$row['id']."' class='btn btn-primary'><</button>
            <button type='submit' name='right' value='".$row['id']."' class='btn btn-primary'>></button>
            </div>
        </div>
        
        </div></form>");
      }

      ?>
