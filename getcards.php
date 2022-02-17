<?php
      $stmt = $db->prepare("SELECT * FROM `exercises` WHERE `user` = ?");
      $stmt->execute([$_SESSION['login']]);
      
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
            <textarea name='description' cols='40' rows='10' style='resize: none;' class='text-secondary'>".$row['description']."</textarea>
        </div>
        
        </div></form>");
      }
      ?>
