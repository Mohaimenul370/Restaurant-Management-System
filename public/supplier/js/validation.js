function validationform(){

       

    var pid= document.getElementById("pid").value;
    var pname=document.getElementById("pname").value;
    var pdesc=document.getElementById("pdesc").value;
    var pcategory=document.getElementById("pcategory").value;
    var pprice=document.getElementById("pprice").value;
   
    if (pid == "" || pid == 0 ) {
        document.getElementById("errorfname").innerHTML="Please fill out product id";
         return false;
       }
      if ( pname == "" || pname == pname.length<2) {
        document.getElementById("errorlname").innerHTML="Please fill out product name";
         return false;
       }
       if ( pdesc == "" || pdesc == pdesc.length<5) {
        document.getElementById("errorlname").innerHTML="Please fill out description";
         return false;
       }   if ( pcategory == "" || pcategory == pcategory.length<3) {
        document.getElementById("errorlname").innerHTML="Please fill out catagory";
         return false;
       }
       if ( pprice == "" || pprice == pprice.length<10) {
        document.getElementById("errorlname").innerHTML="Please fill out price ";
         return false;
       }
       return true;
    
}