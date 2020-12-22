
var clientPassword = document.forms['form-register']['clientPassword'];
var clientFirstname= document.forms['form-register']['clientFirstname'];
var clientLastname = document.forms['form-register']['clientLastname'];
var clientEmail = document.forms['form-register']['clientEmail'];


var clientPassword_error = document.getElementById('clientPassword_error');
var clientFirstname_error = document.getElementById('clientFirstname_error');
var clientLastname_error = document.getElementById('clientLastname_error');
var clientEmail_error = document.getElementById('clientEmail_error');

//GETTING ALL EVENTS LISTEERS

clientPassword.addEventListener("blur", clientPasswordVerify, true);
clientFirstname.addEventListener("blur", clientFirstnameVerify, true);
clientLastname.addEventListener("blur", clientLastnameVerify, true);
clientEmail.addEventListener("blur", clientEmailVerify, true);



function Validate(){

    if (clientFirstname.value == ""){
        clientFirstname.style.border = "2px solid red";
        clientFirstname.focus();
        return false;
    }

    if (clientLastname.value == ""){
        clientLastname.style.border = "2px solid red";
        clientLastname.focus();
        return false;
    }


    



    
}

//verify if it is right

function clientPasswordVerify(){
    var passw =  /^[A-Za-z]\w{7,14}$/;
    if (clientPassword.value.match(passw)){
        clientPassword.style.border = " 2px solid #7FFF00";
        clientPassword_error.innerHTML = "";
        return true;
    }
    else {{
        alert("You have entered an invalid password address!");
        document.form1.text1.focus();
        return false;
    }}
}

function clientFirstnameVerify(){
    if (clientFirstname.value != ""){
        clientFirstname.style.border = " 2px solid #7FFF00";
        clientFirstname_error.innerHTML = "";
        return true;

    }
}

function clientLastnameVerify(){
    if (clientLastname.value != ""){
        clientLastname.style.border = " 2px solid #7FFF00";
        clientLastname_error.innerHTML = "";
        return true;

    }
}

function clientEmailVerify(){
    var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    if (clientEmail.value.match(mailformat)){
        clientEmail.style.border = " 2px solid #7FFF00";
        clientEmail_error.innerHTML = "";
        return true;
    }
    else {{
        alert("You have entered an invalid email address!");
        document.form1.text1.focus();
        return false;
    }}
}

function myFunction() {
    var x = document.getElementById("clientPassword");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }