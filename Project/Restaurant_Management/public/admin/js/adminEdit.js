function checkName() {
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



function formValidation() {
    let name = checkName()
    let email = checkEmail()

    if (name && email) {

        return true


    }
    else {
        alert("Fill the form")
        return false
    }
}