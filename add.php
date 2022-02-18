<?php
if (isset($_REQUEST['add']))
{
    $_REQUEST['name'] = str_replace('<', '&#60;',$_REQUEST['name']);
    $_REQUEST['name'] = str_replace('>', '&#62;',$_REQUEST['name']);
    $_REQUEST['description'] = str_replace('<', '&#60;',$_REQUEST['description']);
    $_REQUEST['description'] = str_replace('>', '&#62;',$_REQUEST['description']);
    $query = "INSERT INTO `exercises` (`id`, `user`, `name`, `description`, `stage`) VALUES (NULL, :login, :name, :description, 0);";
    $params = [
        ':login' => $_SESSION['login'],
        ':name' => $_REQUEST['name'],
        ':description' => $_REQUEST['description']
    ];
    $stmt = $db->prepare($query);
    $stmt->execute($params);
    header("Location: main.php");
}
//<div class="card">
//    <img class="card-img-top" src="https://i.ytimg.com/vi/8zpIUq9EqoM/maxresdefault.jpg" alt="">
//    <div class="card-body">
//        if(isset($_SESSION['login']))
//        {
//            print("<h4 class='card-title text-primary'>Привет, ".$_SESSION['login']."!</h4>");
//        }
//        <p class="text-secondary">Тут пока пусто...</p>
//    </div>
//</div>
?>
<form action="main.php" method="POST" class="cardab">
    <div class="card">
    <div class="card-header">
            <input class="form-control" type="text" name="name" placeholder="Название">
            </div>
        <div class="card-body" style="display: flex;flex-direction: column;">
            <textarea class="form-control" name="description" cols="30" rows="10" style="resize: none;" placeholder="Описание"></textarea>
            <button type="submit" name="add" class="btn btn-success">Добавить</button>
        </div>
    </div>
</form>