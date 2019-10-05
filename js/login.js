function check_and_login() {
    if ($("#loginEmail").val()) {
        alert("Succesful Login");

    } else {
        alert("Enter Valid Proper Email ID");
    }
}

function make_login_request(email, password) {

}

function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}