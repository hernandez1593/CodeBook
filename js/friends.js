function getFile() {

    document.getElementById("upfile").click();
}

function uploadImage() {
    document.getElementById("form-image").submit();
}

function validateSearch() {
    var name = document.getElementById('box-search-name').value;
    console.log(name);
    if (name != "") {
        loadSearchedUsers(name);
    }
}

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

function loadSearchedUsers(name) {
    var xhttp = new obtenerXHR();
    console.log(name);
    xhttp.open("GET", "../php/Person.php?action=getuser&name=" + name, true);
    xhttp.onreadystatechange = function () {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            //Space to insert divs and shit
            console.log('Inserted here');
            var space = document.getElementById('add-friend');
            //var respuestaJSON = xhttp.responseText;
            console.log(xhttp.responseText);
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
                //
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



function loadMyFriends() {
    var xhttp = new obtenerXHR();
    console.log("changa");
    xhttp.open("GET", "../php/Person.php?action=getfriends", true);
    xhttp.onreadystatechange = function () {
        if (xhttp.readyState == 4 && xhttp.status == 200) {


            var space = document.getElementById('add-friend');

            var obj = eval('(' + xhttp.responseText + ')');
            console.log(obj);
            $('friend-list').empty();
            for (var i = 0; i < obj.length; i++) {
                var div1 = document.createElement("div");
                var div2 = document.createElement("div");
                var div3 = document.createElement("div");
                var div4 = document.createElement("div");
                var div5 = document.createElement("div");
                var div6 = document.createElement("div");
                var img = document.createElement("img");
                var h4 = document.createElement("h4");
                div1.setAttribute("class", "panel-content");
                div2.setAttribute("class", "row");
                div3.setAttribute("class", "col-md-offset-1 col-md-5");
                div4.setAttribute("class", "col-md-12");
                div5.setAttribute("class", "row");
                div6.setAttribute("class", "col-md-6");
                img.setAttribute("class", "img-responsive img-rounded");
                img.style.maxWidth = "100%";
                console.log(obj[i]['img']);
                img.src = "../images/" + obj[i]['img'];




                h4.innerHTML = obj[i]['fName'] + " " + obj[i]['lName'];

                div6.appendChild(h4);



                //modal attibutes
                var ninja = document.getElementById("ninja").innerHTML;
                //console.log(ninja + "***" + "Teacher");
                if (ninja.includes('Teacher')) {
                    var email = document.createElement("h4");
                    var admission = document.createElement("h4");
                    var id = document.createElement("h4");
                    var username = document.createElement("h4");
                    var username = document.createElement("h4");
                    email.innerHTML = "Email: " + obj[i]['email'];
                    admission.innerHTML = "Admission Date:" + obj[i]['admissionDate'];
                    username.innerHTML = "Username: " + obj[i]['username'];
                    id.innerHTML = "ID: " + obj[i]['id'];
                    div6.appendChild(email);
                    div6.appendChild(admission);
                    div6.appendChild(id);
                    div6.appendChild(username);

                }


                div5.appendChild(div6);
                div3.appendChild(img);
                div4.appendChild(div5);


                div2.appendChild(div3);
                div2.appendChild(div4);
                div1.appendChild(div2);
                div1.appendChild(div5);
                $('#my-friends').append(div1);




            }



        } else // Petición no completada
        {
            console.log("No completada | Estado de la petición: " + xhttp.readyState);
        }
    };
    xhttp.send();
}
