function getFile()
{
   document.getElementById("upfile").click();
}

function subirImagen()
{
    document.getElementById("form-image").submit();
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
