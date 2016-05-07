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
    console.log(url);
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
    //Hides the save changes
    $('#save_changes').removeClass('show-me').addClass('hide-me');
}

function showAll(){
    $('.edit').removeClass('hide-me').addClass('show-me');
    $('#save_changes').removeClass('hide-me').addClass('show-me');
}

function saveChanges(){
    var admission = document.getElementById('admission').value;
    var pass = document.getElementById('pass').value;
    var fname = document.getElementById('first_name').value;
    var lname = document.getElementById('last_name').value;
    var gender = document.getElementById('selectGender').innerHTML;
    var userame = document.getElementById('username').value;
    var email = document.getElementById('email').value;

    if(fname=="" || lname=="" || id=="" || username=="" || email=="" || pass=="" || admission==""){
        alert("Empty spaces still exist");
        //evt.preventDefault();
        //window.history.back();
        return false;
    }else{
        hideAll();
        return true;
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
    }else if(option=="Posts"){
        carga('myPublications.php','page_content');
    }
}

hideAll();
//Loads on main page load
carga('Profile.php','page_content');
