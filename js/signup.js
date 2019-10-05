function validate(){
    var fname =document.getElementById('fnm').value;
    var lname =document.getElementById('lnm').value;
    var phno= document.getElementById('phone').value;
    var email = document.getElementById('email_id').value;
    var addr = document.getElementById('addr').value;
    var passwd1 = document.getElementById('password1').value;
    var passwd2 = document.getElementById('password2').value;
    if ( passwd1 == passwd2){
        console.log(fname);
        console.log(lname);
        console.log(phno);
        console.log(email);
        console.log(addr);
        console.log(passwd1);
        console.log(passwd2);
        alert ("Account Created Successfully");
        return false;
    }
    else{
    attempt --;// Decrementing by one.
    alert("Passwords not matching");
    }
} 