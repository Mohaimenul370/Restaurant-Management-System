function checkFullNAme() {
    let obj = document.getElementById('name').value;
    if (obj != '') {
        return obj;
    }
    else {
        return false;
    }
}

function checkEmail() {
    let obj = document.getElementById('email').value;
    if (obj != '') {
        return obj;
    }
    else {
        return false;
    }
}

function checkUsername() {
    let obj = document.getElementById('username').value;
    if (obj != '') {
        return obj;
    }
    else {
        return false;
    }
}

function checkPassword() {
    let obj = document.getElementById('password').value;
    if (obj != '') {
        return obj;
    }
    else {
        return false;
    }
}
function checkGender() {
    let radio = document.getElementsByName('gen');
    let gender_val = '';
    for (let i = 0; i < radio.length; i++) {
        if (radio[i].checked) {
            gender_val = radio[i].value;
        }
    }


    if (gender_val != '') {
        return gender_val;
    }
    else {
        return false;
    }
}



function formValidation(){
    let name = checkFullNAme()
    let email = checkEmail()
    let username =checkUsername()
    let pas = checkPassword()
    let gen = checkGender()
    

    if(name && email && username && pas && gen){
        return true
    }
    else{
        alert("Fill the form")
        return false
    }
}