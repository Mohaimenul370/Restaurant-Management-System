function checkFullNAme() {
  let obj = document.getElementById('fullName').value;
  if (obj != '') {
    return obj;
  } else {
    return false;
  }
}

function checkEmail() {
  let obj = document.getElementById('email').value;
  if (obj != '') {
    return obj;
  } else {
    return false;
  }
}

function checkDesignation() {
  let obj = document.getElementById('designation').value;
  if (obj != '') {
    return obj;
  } else {
    return false;
  }
}

function checkfavFood() {
  let obj = document.getElementById('favFood').value;
  if (obj != '') {
    return obj;
  } else {
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
  } else {
    return false;
  }
}

function formSubmit() {
  // alert('Working');
  let name = checkFullNAme();
  let email = checkEmail();
  let designation = checkDesignation();
  let favFood = checkfavFood();
  let gender = checkGender();
  if (name && email && designation && favFood && gender) {
    let formdata = {
      name: name,
      email: email,
      designation: designation,
      favFood: favFood,
      gender: gender,
    };
    let data = JSON.stringify(formdata);
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'ajax/addStaffAjax.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        console.log(this.responseText);
        // if (this.responseText == 'True') {
        //   document.getElementById('msg').innerHTML = 'Adding complete';
        //   setTimeout(function () {
        //     document.getElementById('msg').innerHTML = '';
        //   }, 3000);
        //   document.getElementById('form').reset();
        //   return true;
        // } else {
        //   document.getElementById('msg').innerHTML = 'Adding failed';
        //   console.log(this.responseText);
        //   return false;
        // }
      }
    };
    xhr.send('add=' + data);
  } else {
    alert('Submit All data');
  }
}
