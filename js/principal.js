function obtenerXHR() {
    req = false;
    if (window.XMLHttpRequest) {
        req = new XMLHttpRequest();
    } else {
        if (ActiveXObject) {
            var vectorVersiones = ["MSXML2.XMLHttp.5.0", "MSXML2.XMLHttp.4.0", "MSXML2.XMLHttp.3.0", "MSXML2.XMLHttp", "Microsoft.XMLHttp"];
            for (var i = 0; i < vectorVersiones.lengt; i++) {
                try {
                    req = new ActiveXObject(vectorVersiones[i]);
                    return req;
                } catch (e) {}
            }
        }
    }
    return req;
}
/*function createXMLHttpRequest() {
    var xmlHttp = null;
    if (window.ActiveXObject) xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
    else if (window.XMLHttpRequest)
        xmlHttp = new XMLHttpRequest();
    return xmlHttp;
}

function cargar(url, id) {
    var pagecnx = createXMLHttpRequest();
    pagecnx.onreadystatechange = function () {
        if (pagecnx.readyState === 4 &&
            (pagecnx.status === 200 || window.location.href.indexOf("http") === -1))
            document.getElementById(id).innerHTML = pagecnx.responseText;
    };
    pagecnx.open('GET', url, true);
    pagecnx.send(null);
}


function cargarPerfil(user) {
    $.ajax({
        url: '../php/Person.php?action=getuser',
        type: 'GET',
        data: {
            name: daniel
        },
        success: function (data) {

            data = $.parseJSON(data);


            console.log(data);
            var nombre = document.getElementsByName("nombreEditar");
            nombre.value = data['fName'];



        }

    });

}

*/

function cargarPublicaciones(data) {
    console.log($data);
    //cargar('myPublication.php', 'pubsHere');

    if (peticion.readyState === 4 && peticion.status === 200) // Petición completada
    {
        var respuestaJSON = data['publication'];
        console.log("hola");
        var json_publicaciones = eval("(" + respuestaJSON + ")"); // Se evalua la respuesta del JSON
        for (var i = 0; i < json_publicaciones.length; i++) {
            var div = document.createElement("div");
            var h41 = document.createElement("h4");
            var h42 = document.createElement("h4");
            var h43 = document.createElement("h4");
            var h61 = document.createElement("h6");
            var h62 = document.createElement("h6");
            var h63 = document.createElement("textarea");
            h63.setAttribute("class", "text-area");
            h63.setAttribute("readonly", "");
            h63.setAttribute("style", "font-size: 0.9em");
            var hr = document.createElement("hr");

            h41.appendChild(document.createTextNode("Descripción"));
            h42.appendChild(document.createTextNode("Lenguaje"));
            h43.appendChild(document.createTextNode("Código"));
            h61.appendChild(document.createTextNode(json_publicaciones[i]['descripcion']));
            h62.appendChild(document.createTextNode(json_publicaciones[i]['nombre']));
            h63.appendChild(document.createTextNode(json_publicaciones[i]['codigo']));


            h41.setAttribute("class", "green lato");
            h42.setAttribute("class", "green lato");
            h43.setAttribute("class", "green lato");


            div.appendChild(h41);
            div.appendChild(h61);
            div.appendChild(h42);
            div.appendChild(h62);
            div.appendChild(h43);
            div.appendChild(h63);
            div.appendChild(hr);
            $(".misPublicaciones").append(div);
        }
    } else // Petición no completada
    {
        console.log("No completada | Estado de la petición: " + peticion.readyState);
    }




}
