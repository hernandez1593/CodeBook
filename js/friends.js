


//Used to make validations about the txt inserted in search friends
function validateSearch() {
    var name = document.getElementById('box-search-name').value;

    if (name != "") {
        loadSearchedUsers(name);
    }else{
        /*
        var ur = $('#form-search').attr('action');
        var met = $('#from-search').attr('method');
         $.ajax({
            data: $('#form-search').serialize(),
            url: ur,
            type: met,
            success: function(resp)
            {
                var data;
                var ok = true;
                console.log(resp);
                resp = $.parseJSON(resp);
            },
            error: function(jqXHR, estado, error)
            {
                console.log("Error en la busqueda del usuario.");
            },
            timeout: 4000

        });
        */
         var error = document.getElementById('error-search');
        $('#error-search').removeClass('hide-me');
    }
}




function loadSearchedUsers(name) {
    var xhttp = new obtenerXHR();
    console.log(name);
    xhttp.open("GET", "../php/Person.php?action=getuser&name=" + name, true);
    xhttp.onreadystatechange = function () {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            //Space to insert divs and shit
            var space = document.getElementById('add-friend');
            //var respuestaJSON = xhttp.responseText;
            console.log(xhttp.responseText);
            console.log("HOLA");
            //var respuestaJSON = JSON.parse(xhttp.responseText);
            //console.log(typeof(respuestaJSON));
            //console.log(respuestaJSON);
            //var obj = JSON.parse(respuestaJSON);
            var obj = eval('(' + xhttp.responseText + ')'); // Se evalua la respuesta del JSON
            $('#friend-result').empty();
            for (var i = 0; i < obj.length; i++) {
                // Crear elemento para cada amigo
                var div = document.createElement("div");
                var input = document.createElement("input");
                input.setAttribute("id", "friend-" + obj[i]['id_person']);
                input.setAttribute("class", "input-lg");
                input.setAttribute("value", obj[i]['fName']);
                input.setAttribute("readonly", "");
                div.appendChild(input);

                $('#friend-result').append(div);
            }
        } else // Petición no completada
        {
            console.log("No completada | Estado de la petición: " + xhttp.readyState);
        }
    };
    xhttp.send();
}

$('.grid').masonry({
  itemSelector: '.grid-item',
  columnWidth: 100,
});

