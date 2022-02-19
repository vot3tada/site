$(document).ready(function(){
    document.getElementsByName('add').onclick(function(){
        var name = document.getElementsByName('addname').value;
        var description = document.getElementsByName('adddescription').value;

        $.ajax({
            method: "POST",
            url: "add.php",
            data: {name: name, description: description}
        });
    });
});