// ------------------------------ Validation for login page -------------------------------------
function loginValidator() {
  var flag = 0;

  // ---------------------------------------------------------------Email Validation
  var pattern =
    /^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/;

  var email = document.getElementById('email');
  var email_err = document.getElementById('email-validation-err');
  var email_err_msg = '';

  if (email.value.length < 1) {
    email_err_msg = '* Email is required';
    flag = 1;
  } else if (pattern.test(email.value) == false) {
    alert('Hello');
    email_err_msg = '* Invalid email';
    flag = 1;
  }

  //   --------------------------------------------------------------Password Validation
  var pass = document.getElementById('password');
  var pass_Err = document.getElementById('password-validation-err');
  var pass_err_msg = '';

  if (pass.value.length < 1) {
    pass_err_msg = '* Password is required';
    flag = 1;
  }

  //   ---------------------------------------------------------------Return
  if (flag === 1) {
    email_err.innerHTML = email_err_msg;
    pass_Err.innerHTML = pass_err_msg;

    return false;
  }
}

// ------------------------------ Validation for registration page -------------------------------------
function registrationValidation() {
  var fName = document.getElementById('fName');
  var email = document.getElementById('email');
  var pass = document.getElementById('pass');
  var passR = document.getElementById('passR');
  var male = document.getElementById('male');
  var female = document.getElementById('female');
  var others = document.getElementById('others');
  var food1 = document.getElementById('chinese');
  var food2 = document.getElementById('local');
  var food3 = document.getElementById('fast-food');
  var img = document.getElementById('img');

  var nameErr = document.getElementById('name-err');
  var emailErr = document.getElementById('email-err');
  var passErr = document.getElementById('pass-err');
  var passRErr = document.getElementById('passR-err');
  var genderErr = document.getElementById('gender-err');
  var foodErr = document.getElementById('food-err');
  var imgErr = document.getElementById('img-err');

  var nameErrMsg = '';
  var emailErrMsg = '';
  var passErrMsg = '';
  var passRErrMsg = '';
  var genderErrMsg = '';
  var foodErrMsg = '';
  var imgErrMsg = '';

  var regex =
    /^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/;
  var flag = 0;

  //   ---------------------------------Name validation
  if (fName.value.length < 1) {
    nameErrMsg = '* Name is required.';
    flag = 1;
  } else if (fName.value.length < 5) {
    nameErrMsg = '* Name must be more than 5 characters long.';
    flag = 1;
  }
  //   -----------------------------Email validation
  if (email.value.length < 1) {
    emailErrMsg = '* Email is required';
    flag = 1;
  } else if (regex.test(email.value) == false) {
    emailErrMsg = '* Invalid email';
    flag = 1;
  }
  //   --------------------------------Password validation
  if (pass.value.length < 1) {
    passErrMsg = '* Password is required';
    flag = 1;
  } else if (pass.value.length < 5) {
    passErrMsg = '* Weak password';
    flag = 1;
  }

  //   --------------------------------Retyped password validation
  if (passR.value.length < 1) {
    passRErrMsg = '* Password is required';
    flag = 1;
  } else if (passR.value.length < 5) {
    passRErrMsg = '* Weak password';
    flag = 1;
  }

  // --------------------------------------Gender validation
  if (
    male.checked === false &&
    female.checked === false &&
    others.checked === false
  ) {
    genderErrMsg = '* Must select a gender';
    flag = 1;
  }
  //   // ---------------------------------------Hobby validation
  if (
    food1.checked === false &&
    food2.checked === false &&
    food3.checked === false
  ) {
    foodErrMsg = '* Must select a food';
    flag = 1;
  }
  //   // ------------------------------------Image validation
  if (img.value.length < 1) {
    imgErrMsg = '* Must select an image';
    flag = 1;
  } else {
    var pattern2 = /(.jpg|.png|.jpeg)/;
    // Matching pattern and accessing file size from file object in the file api
    if (pattern2.test(img.value) == false || img.files[0].size > 20000) {
      imgErrMsg = '* Invalid file';
      flag = 1;
    }
  }

  // --------------------------------Return values

  if (flag == 1) {
    nameErr.innerHTML = nameErrMsg;
    emailErr.innerHTML = emailErrMsg;
    passErr.innerHTML = passErrMsg;
    passRErr.innerHTML = passRErrMsg;
    genderErr.innerHTML = genderErrMsg;
    foodErr.innerHTML = foodErrMsg;
    imgErr.innerHTML = imgErrMsg;
    return false;
  }
}

// ------------------------------ Validation for edit page -------------------------------------
function editValidation() {
  var fName = document.getElementById('fName');
  var email = document.getElementById('email');
  var pass = document.getElementById('pass');
  var passR = document.getElementById('passR');
  var male = document.getElementById('male');
  var female = document.getElementById('female');
  var others = document.getElementById('others');
  var food1 = document.getElementById('chinese');
  var food2 = document.getElementById('local');
  var food3 = document.getElementById('fast-food');
  var img = document.getElementById('img');

  var nameErr = document.getElementById('name-err');
  var emailErr = document.getElementById('email-err');
  var passErr = document.getElementById('pass-err');
  var passRErr = document.getElementById('passR-err');
  var genderErr = document.getElementById('gender-err');
  var foodErr = document.getElementById('food-err');
  var imgErr = document.getElementById('img-err');

  var nameErrMsg = '';
  var emailErrMsg = '';
  var passErrMsg = '';
  var passRErrMsg = '';
  var genderErrMsg = '';
  var foodErrMsg = '';
  var imgErrMsg = '';

  var regex =
    /^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/;
  var flag = 0;

  //   ---------------------------------Name validation
  if (fName.value.length >= 1 && fName.value.length < 5) {
    nameErrMsg = '* Name must be more than 5 characters long.';
    flag = 1;
  }
  //   -----------------------------Email validation
  if (email.value.length >= 1) {
    if (regex.test(email.value) == false) {
      emailErrMsg = '* Invalid email';
      flag = 1;
    }
  }
  //   --------------------------------Password validation
  if (pass.value.length >= 1 && pass.value.length < 6) {
    passErrMsg = '* Weak password';
    flag = 1;
  }

  //   --------------------------------Retyped password validation
  if (passR.value.length >= 1 && passR.value.length < 5) {
    passRErrMsg = '* Weak password';
    flag = 1;
  }

  // ------------------------------------Image validation

  if (img.value.length > 0) {
    var pattern2 = /(.jpg|.png|.jpeg)/;
    // Matching pattern and accessing file size from file object in the file api
    if (pattern2.test(img.value) == false || img.files[0].size > 20000) {
      imgErrMsg = '* Invalid file';
      flag = 1;
    }
  }

  // --------------------------------Return values

  if (flag == 1) {
    nameErr.innerHTML = nameErrMsg;
    emailErr.innerHTML = emailErrMsg;
    passErr.innerHTML = passErrMsg;
    passRErr.innerHTML = passRErrMsg;
    genderErr.innerHTML = genderErrMsg;
    foodErr.innerHTML = foodErrMsg;
    imgErr.innerHTML = imgErrMsg;
    return false;
  }
}

// ------------------------------ Validation for add menu  page -------------------------------------

function itemValidation() {
  //   ---------------------------------Name validation
  var fName = document.getElementById('fName');
  var nameErr = document.getElementById('name-err');
  var nameErrMsg = '';

  if (fName.value.length < 2) {
    nameErrMsg = '* Name must be more than 2 characters long.';
    flag = 1;
  }

  // ------------------------------------Image validation
  var img = document.getElementById('img');
  var imgErr = document.getElementById('img-err');
  var imgErrMsg = '';

  if (img.value.length > 0) {
    var pattern2 = /(.jpg|.png|.jpeg)/;
    // Matching pattern and accessing file size from file object in the file api
    if (pattern2.test(img.value) == false || img.files[0].size > 20000) {
      imgErrMsg = '* Invalid file';
      flag = 1;
    }
  } else if (img.value.length < 0) {
  }
  if (flag == 1) {
    nameErr.innerHTML = nameErrMsg;
    imgErr.innerHTML = imgErrMsg;
    return false;
  }
}
