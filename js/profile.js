function createXMLHttpRequest() {
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

function carga(url,id)
{
    var pagecnx = createXMLHttpRequest();
    pagecnx.onreadystatechange=function()
    {
        if (pagecnx.readyState === 4 &&
           (pagecnx.status===200 || window.location.href.indexOf("http")===-1))
               document.getElementById(id).innerHTML=pagecnx.responseText;
    };
    pagecnx.open('GET',url,true);
    pagecnx.send(null);
}


function hideAll(){
    $('.edit').removeClass('show-me').addClass('hide-me');
}

function showAll(){
    $('.edit').removeClass('hide-me').addClass('show-me');
}

function saveChanges(){
    var fname = document.getElementById('first_name');
    var lname = document.getElementById('last_name');
    var gender = document.getElementById('selectGender').innerHTML;
    var id = document.getElementById('id_person');
    var userame = document.getElementById('username');
    var email = document.getElementById('email');

    if(fname=="" || lname=="" || id=="" || username=="" || email==""){

    }
}

function log_out()
{
    location.href = "../index.php";
}

function onNavigtionClick(option){
    if(option=="Profile"){
        carga('Profile.php','page_content');
    }else if(option=="Friends"){
        carga('friends.php','page_content');
    }

}

//Loads on main page load
carga('profile.php','page_content');
