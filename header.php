<?php
    session_start();
    if (isset($_REQUEST['main']))
    {
        header("Location: main.php");
    }
    if (isset($_REQUEST['singup']))
    {
        header("Location: auth.php");
    }
    if (isset($_REQUEST['reg']))
    {
        header("Location: reg.php");
    }
    if (isset($_REQUEST['singout']))
    {
        if(isset($_SESSION['login']))
        {
            session_destroy();
        }
        header("Location: main.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <script
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous"></script>
    <script type="text/javascript" src="jsc.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Веб-технологии</title>
</head>
<header>
<form action="header.php" method="POST">
    <div class="head1 list-group-item list-group-item-primary">
    <div class="btn-group btn-group-lg">
    <button type="submit" class="btn btn-primary" name="main">Веб-технологии</h1>
    </div>
    <div class="btn-group btn-group-lg">
    <?php
        if (isset($_SESSION['login']))
        {
            print('<button type="submit" class="btn btn-secondary" name="singout">Выйти</button>');
        }
        else
        {
            print('<button type="submit" class="btn btn-secondary" name="reg">Регистрация</button>');
            print('<button type="submit" class="btn btn-secondary" name="singup">Вход</button>');
        }
    ?>    
    </div>
    </div>
</form>
</header>
<body class="text-center h-100 text-white bg-light">