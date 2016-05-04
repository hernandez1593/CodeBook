function createXMLHttpRequest() {
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



function cargarPublicaciones(data) {


    cargar('myPublication.php','pubsHere');




}



url: '/php/seguirPersona.php?action=getuser'
