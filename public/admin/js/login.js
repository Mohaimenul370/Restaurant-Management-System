function checkFullNAme() {
    let obj = document.getElementById('username').value;
    if (obj != '') {
        return obj;
    }
    else {
        return false;
    }
}

function checkEmail() {
    let obj = document.getElementById('password').value;
    if (obj != '') {
        return obj;
    }
    else {
        return false;
    }
}

function formValidation(){
    let username = checkFullNAme()
    let password = checkEmail()

    if(username && password){
        return true
    }
    else{
        alert("Fill the form")
        return false
    }
}