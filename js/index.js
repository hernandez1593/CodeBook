//$("#error-login").removeClass('hide-me');
//$("#error-sign-up").removeClass('hide-me');

function validateRegistryForm() {
    var identification = document.getElementById('id').value;
    var fName = document.getElementById('fName').value;
    var lName = document.getElementById('lName').value;
    var email = document.getElementById('email').value;
    var username = document.getElementById('username').value;
    var pass = document.getElementById('pass').value;
    var typeUser = $('#selectUser').find(":selected").text();
    var gender = $('#selectGender').find(":selected").text();
    var admission = document.getElementById('admission-date').value;
    //'1993-09-30'
    //Validate empty spaces
    if (identification == "" || fName == "" || lName == "" || email == "" || username == "" || pass == "" || typeUser == "" || gender == "" || admission == "") {
        $("#error-sign-up").removeClass('hide-me');
        return false;
    } else if (!isNumeric(identification)) {
        $("#error-sign-up").removeClass('hide-me');
        return false;
    } else return true;
}

function isNumeric(n) {
    return !isNaN(parseFloat(n)) && isFinite(n);
}

function validateLogin() {
    var user = document.getElementById('user').value;
    var user = document.getElementById('pass').value;
    if (user == "" || pass == "") {
        $("#error-login").removeClass('hide-me');
        return false;
    } else {
        return true;
    }
}
