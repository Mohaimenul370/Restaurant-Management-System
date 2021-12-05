'use strict';

// =================================================================== Using Javascript to send AJAX request...
// GET request
var xhr = new XMLHttpRequest();
xhr.onreadystatechange = function () {
  if (this.readyState == 4 && this.status == 200) {
    document.querySelector('.info').innerHTML = this.responseText;
  }
};
xhr.open('GET', 'requests/showAllStaff.php', true);
xhr.send();

// POST REQUEST
var searchBox = document.getElementById('search-box');
searchBox.addEventListener('keyup', function () {
  var http = new XMLHttpRequest();
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.querySelector('.info').innerHTML = this.responseText;
    }
  };

  http.open('POST', 'requests/showCertainStaff.php', true);
  http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  http.send(`Full_Name=${searchBox.value}`);
});

// ======================================================================== Using jQuery to send AJAX request...
//     $(document).ready(function(){

//         // On page load shows all the data in the table.
//         // $.ajax({
//         //     url:'showAllStaff.php',
//         //     success:function(res){
//         //         $('.info').html(res);
//         //     }
//         // });

//         $('#search-box').keyup(function(){
//             var fName = $('#search-box').val();
//             // alert(fName);
//             $.ajax({
//                 url:'showCertainStaff.php',
//                 type:'POST',
//                 data:{Full_Name:fName},
//                 success:function(res){
//                     $('.info').html(res);
//                 }
//             });

//         });

// });
