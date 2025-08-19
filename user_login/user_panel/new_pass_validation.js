

//password confirmation//

//------------------------------------------------------------------//


// password visibility //
function myFunction() {
var x = document.getElementById("pname");
if (x.type === "password") {
   document.getElementById("eye").className = "fa-solid fa-eye";
   x.type = "text";
} else {
   document.getElementById("eye").className = "fa-solid fa-eye-slash";
   x.type = "password";
}
}
function myFunction_confirm() {
var x = document.getElementById("confirm_pname");
if (x.type === "password") {
   document.getElementById("eye_confirm").className = "fa-solid fa-eye";
   x.type = "text";
} else {
   document.getElementById("eye_confirm").className = "fa-solid fa-eye-slash";
   x.type = "password";
}
}
// ------------------------------------------------------//
// password validation
var myInput = document.getElementById("pname");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

  // When the user clicks on the password field, show the message box
  pname.onfocus = function () {
   document.getElementById("message").style.display = "block";
   }


   // When the user starts to type something inside the password field
   myInput.onkeyup = function() {
       // Validate lowercase letters
       var lowerCaseLetters = /[a-z]/g;
       if(myInput.value.match(lowerCaseLetters)) {  
       letter.classList.remove("invalid");
       letter.classList.add("valid");
       } else {
       letter.classList.remove("valid");
       letter.classList.add("invalid");
       }

       // Validate capital letters
       var upperCaseLetters = /[A-Z]/g;
       if(myInput.value.match(upperCaseLetters)) {  
       capital.classList.remove("invalid");
       capital.classList.add("valid");
       } else {
       capital.classList.remove("valid");
       capital.classList.add("invalid");
       }

       // Validate numbers
       var numbers = /[0-9]/g;
       if(myInput.value.match(numbers)) {  
       number.classList.remove("invalid");
       number.classList.add("valid");
       } else {
       number.classList.remove("valid");
       number.classList.add("invalid");
       }

       // Validate length
       if(myInput.value.length >= 8) {
       length.classList.remove("invalid");
       length.classList.add("valid");
       } else {
       length.classList.remove("valid");
       length.classList.add("invalid");
       }
}

   
   
