function validateLogin() {
  var usrInput = document.getElementById('usr-input').value;
  var passInput = document.getElementById('pass-input').value;

  if(usrInput == "" || passInput == "") {
    alert("You glubbed up. Also, make the fields turn red.");
    return false;
  }
}
