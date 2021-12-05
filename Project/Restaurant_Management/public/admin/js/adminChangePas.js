function checkOldPas() {
    let obj = document.getElementById('old_pass').value;
    if (obj != '') {
        return obj;
    }
    else {
        return false;
    }
}

function checkNewPas() {
    let obj = document.getElementById('new_pass').value;
    if (obj != '') {
        return obj;
    }
    else {
        return false;
    }
}

function checkConNewPas() {
    let obj = document.getElementById('con_pass').value;
    if (obj != '') {
        return obj;
    }
    else {
        return false;
    }
}

function formValidation(){
    let oldPas = checkOldPas()
    let newPas = checkNewPas()
    let conNewPas =checkConNewPas()

    if(oldPas && newPas && conNewPas){
        if(newPas == conNewPas){
            return true
        }
        else{
            alert("New Password and Confirm Password Does Not match")
            return false
        }
        
    }
    else{
        alert("Fill the form")
        return false
    }
}