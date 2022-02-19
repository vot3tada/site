<?php
    require("header.php");
    require("autosingup.php");
?>
<script>
    function getcardstart()
    {
        $.ajax({
            method: "POST",
            url: "getcards.php",
        }).done(function(msg){
            //alert(msg);
            var a = msg.split('"');
            var i = 1;
            document.getElementById('start').innerHTML = "";
            while (i < a.length)
            {
                document.getElementById('start').innerHTML+="<div class='card cardab'><div class='card-header' style='display: inline-flex;justify-content: space-between;'><h4 class='text-primary'>"+a[(i+2)]+"</h4><div style='width: 90px;height: 38px;display: flex;'><button name='edit' onclick='cardsfunc("+a[i]+", "+'"edit"'+");' value='"+a[i]+"' class='btn btn-warning'>Edit</button><button type='submit' onclick='cardsfunc("+a[i]+", "+'"delete"'+");' name='delete' value='"+a[i]+"' class='btn btn-danger'>X</button></div></div><div class='card-body'><textarea id='t"+a[i]+"' name='description' cols='40' rows='10' style='resize: none;' class='text-secondary form-control'>"+a[(i+4)]+"</textarea><div style='display: grid;grid-auto-flow: column;'><button type='submit' onclick='cardsfunc("+a[i]+", "+'"left"'+");' name='left' value='"+a[i]+"' class='btn btn-primary'><</button><button type='submit' onclick='cardsfunc("+a[i]+", "+'"right"'+");' name='right' value='"+a[i]+"' class='btn btn-primary'>></button></div></div></div>";
                i += 6;
            }
        });
    }
    function getcardprocess()
    {
        $.ajax({
            method: "POST",
            url: "getcardsprocess.php",
        }).done(function(msg){
            //alert(msg);
            var a = msg.split('"');
            var i = 1;
            document.getElementById('process').innerHTML = "";
            while (i < a.length)
            {
                document.getElementById('process').innerHTML+="<div class='card cardab'><div class='card-header' style='display: inline-flex;justify-content: space-between;'><h4 class='text-primary'>"+a[(i+2)]+"</h4><div style='width: 90px;height: 38px;display: flex;'><button name='edit' onclick='cardsfunc("+a[i]+", "+'"edit"'+");' value='"+a[i]+"' class='btn btn-warning'>Edit</button><button type='submit' onclick='cardsfunc("+a[i]+", "+'"delete"'+");' name='delete' value='"+a[i]+"' class='btn btn-danger'>X</button></div></div><div class='card-body'><textarea id='t"+a[i]+"' name='description' cols='40' rows='10' style='resize: none;' class='text-secondary form-control'>"+a[(i+4)]+"</textarea><div style='display: grid;grid-auto-flow: column;'><button type='submit' onclick='cardsfunc("+a[i]+", "+'"left"'+");' name='left' value='"+a[i]+"' class='btn btn-primary'><</button><button type='submit' onclick='cardsfunc("+a[i]+", "+'"right"'+");' name='right' value='"+a[i]+"' class='btn btn-primary'>></button></div></div></div>";
                i += 6;
            }
        });
    }
    function getcardend()
    {
        $.ajax({
            method: "POST",
            url: "getcardsend.php",
        }).done(function(msg){
            //alert(msg);
            var a = msg.split('"');
            var i = 1;
            document.getElementById('end').innerHTML = "";
            while (i < a.length)
            {
                document.getElementById('end').innerHTML+="<div class='card cardab'><div class='card-header' style='display: inline-flex;justify-content: space-between;'><h4 class='text-primary'>"+a[(i+2)]+"</h4><div style='width: 90px;height: 38px;display: flex;'><button name='edit' onclick='cardsfunc("+a[i]+", "+'"edit"'+");' value='"+a[i]+"' class='btn btn-warning'>Edit</button><button type='submit' onclick='cardsfunc("+a[i]+", "+'"delete"'+");' name='delete' value='"+a[i]+"' class='btn btn-danger'>X</button></div></div><div class='card-body'><textarea id='t"+a[i]+"' name='description' cols='40' rows='10' style='resize: none;' class='text-secondary form-control'>"+a[(i+4)]+"</textarea><div style='display: grid;grid-auto-flow: column;'><button type='submit' onclick='cardsfunc("+a[i]+", "+'"left"'+");' name='left' value='"+a[i]+"' class='btn btn-primary'><</button><button type='submit' onclick='cardsfunc("+a[i]+", "+'"right"'+");' name='right' value='"+a[i]+"' class='btn btn-primary'>></button></div></div></div>";
                i += 6;
            }
        });
    }
    function cardsfunc(id, method)
    {
        var description = document.getElementById('t'+id).value;
        $.ajax({
            method:"POST",
            url:"cardsfunc.php",
            data: {id: id, method: method, description: description}
        }).done(function(msg)
        {
            getcardstart();
            getcardprocess();
            getcardend();
        });
    }
</script>
<?php
    //require("cardsfunc.php");
    if (isset($_SESSION['login']))
    {
        print('<div class="cards">
        <div class="cardplace">
            <div class="alert alert-primary" style="margin-bottom: unset;">Задания</div>
        ');
        require("addht.html");
        print('<div id="start">');
        print('<script>getcardstart()</script>');
        //require("getcards.php");
        print('</div></div>
        <div class="cardplace">
        <div class="alert alert-primary" style="margin-bottom: unset;">В процессе</div>
        ');
        print('<div id="process">');
        print('<script>getcardprocess()</script>');
        print('</div>');
        //require("getcardsprocess.php");
        print('</div>
        <div class="cardplace">
        <div class="alert alert-primary" style="margin-bottom: unset;">Готово</div>
        ');
        print('<div id="end">');
        print('<script>getcardend()</script>');
        print('</div>');
        //require("getcardsend.php");
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