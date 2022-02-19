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