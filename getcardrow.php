<?php
    print("<form action='main.php' method='POST'>
    <div class='card cardab'>
    <div class='card-header' style='display: inline-flex;justify-content: space-between;'>
        <h4 class='text-primary'>".$row['name']."</h4>
        <div style='width: 90px;height: 38px;display: flex;'>
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
?>