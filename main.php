<?php
    require("header.php");
    require("autosingup.php");
    if (isset($_SESSION['login']))
    {
        print('<div class="cards">
        <div class="cardplace">
            <div class="alert alert-primary" style="margin-bottom: unset;">Задания</div>
        ');
        require("addht.html");
        require("getcards.php");
        print('</div>
        <div class="cardplace">
        <div class="alert alert-primary" style="margin-bottom: unset;">В процессе</div>
        ');
        require("getcardsprocess.php");
        print('</div>
        <div class="cardplace">
        <div class="alert alert-primary" style="margin-bottom: unset;">Готово</div>
        ');
        require("getcardsend.php");
        print('</div>
        </div>');
    }
    else
    {
        print('<div class="cards">
        <div class="card">
            <img class="card-img-top" src="https://i.ytimg.com/vi/8zpIUq9EqoM/maxresdefault.jpg" alt="">
            <div class="card-body">
                <h4 class="card-title text-primary">Привет, гость!</h4>
                <p class="text-secondary">Для создания карточек зарегистрируйтесь на сайте</p>
                <audio play controls autoplay style="width: 50%;max-width:600px;">
                <source type="audio/mp3" style="width: 100px; height: 100px;" src="https://biffhard.sunproxy.net/file/TVY0czUyZHo4T09ockVIZW1temtRbXVzRnhoMXltZEcyeCtUeGtjbEpEMFdWMXlYMHFUTzFPUkwwbFdleVRzdVc5aWorM05kL0ZCbHpkTnl4Q3NJQnp4OEFhR0NWSzlxZVAwQUxPU1ltQjQ9/ZOG_-_Podlyj_evrejskij_DRIP_(BiffHard.click).mp3">
                </audio>
            </div>
        </div>
    </div>
        ');
    }
?>


<?php
    require("footer.php");
?>