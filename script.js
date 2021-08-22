
function validatePassword(){
  var password = document.getElementById("psw").value;
  var confirm = document.getElementById("psw_repeat").value;
  if(password != confirm){
      alert("Passwords do not match");
    }

  }
function login(){
  alert("Register Succesful");
}
function redirect(){
  location.replace("artlogin.html");
}
